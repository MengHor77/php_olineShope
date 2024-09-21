<?php
class AuthController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            // Validate credentials
            $query = "SELECT * FROM users WHERE username = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc(); // Fetch user data
                if (password_verify($password, $user['password'])) { // Verify the hashed password
                    session_start();
                    $_SESSION['user'] = ['username' => $username]; // Store the username in an array
                    header('Location: /php/src/dashboard');
                    exit;
                } else {
                    $error = "Invalid username or password.";
                    include __DIR__ . '/../views/login.php';
                }
            } else {
                $error = "Invalid username or password.";
                include __DIR__ . '/../views/login.php';
            }
            $stmt->close();
        } else {
            include __DIR__ . '/../views/login.php';
        }
    }
    public function logout() {
        session_start();
        session_destroy();
        header('Location: /php/src/login');
        exit;
    }
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
    
            // Validate inputs
            if (empty($username) || empty($password) || empty($confirmPassword)) {
                $error = "All fields are required.";
                include __DIR__ . '/../views/register.php';
                return;
            }
    
            // Check if the passwords match
            if ($password !== $confirmPassword) {
                $error = "Passwords do not match.";
                include __DIR__ . '/../views/register.php';
                return;
            }
            // Check if the username already exists
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();  
            if ($stmt->num_rows > 0) {
                $error = "Username already exists.";
                include __DIR__ . '/../views/register.php';
                return;
            }
            // Hash the password before storing it
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashedPassword);
            if ($stmt->execute()) {
                header('Location: /php/src/login');
                exit;
            } else {
                $error = "Error: " . $this->db->error;
                include __DIR__ . '/../views/register.php';
            }
            $stmt->close();
        } else {
            include __DIR__ . '/../views/register.php'; // Show registration form
        }
    }
    
}