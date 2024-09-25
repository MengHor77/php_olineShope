<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_test_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create a table if it doesn't exist
$sql_createTable = "CREATE TABLE IF NOT EXISTS products (
    productID INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(200) NOT NULL,
    productPrice DOUBLE NOT NULL,
    productQty INT NOT NULL,
    productImage VARCHAR(255)
)";

if ($conn->query($sql_createTable) !== TRUE) {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Add product to database
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['edit_id'])) {
    $productName = $conn->real_escape_string($_POST['text_name']);
    $productPrice = $conn->real_escape_string($_POST['text_price']);
    $productQty = $conn->real_escape_string($_POST['text_qty']);

    $productImage = '';
    if (isset($_FILES['text_image']) && $_FILES['text_image']['error'] == 0) {
        $fileTmpPath = $_FILES['text_image']['tmp_name'];
        $fileName = $_FILES['text_image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        $allowedExts = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($fileExtension, $allowedExts)) {
            $uploadFileDir = 'C:/xampp/htdocs/php/src/Page/Admin/uploads/';
           
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }
            $destPath = $uploadFileDir . $fileName;
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $productImage = $fileName;
            } else {
                echo "Error moving the file.<br>";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.<br>";
        }
    }

    $sql = "INSERT INTO products (productName, productPrice, productQty, productImage)
            VALUES ('$productName', '$productPrice', '$productQty', '$productImage')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    } else {
        echo "New record created successfully<br>";
    }
}

// Handle form submission for editing products
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_id'])) {
    $productId = $conn->real_escape_string($_POST['edit_id']);
    $productName = $conn->real_escape_string($_POST['edit_name']);
    $productPrice = $conn->real_escape_string($_POST['edit_price']);
    $productQty = $conn->real_escape_string($_POST['edit_qty']);

    // Retrieve the current product image from the database
    $sql_select = "SELECT productImage FROM products WHERE productID = $productId";
    $result = $conn->query($sql_select);
    $currentImage = '';
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentImage = $row['productImage'];
    }

    $productImage = $currentImage; // Default to the current image

    // Check if a new image was uploaded
    if (isset($_FILES['edit_image']) && $_FILES['edit_image']['error'] == 0) {
        $fileTmpPath = $_FILES['edit_image']['tmp_name'];
        $fileName = $_FILES['edit_image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExts = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($fileExtension, $allowedExts)) {
            $uploadFileDir = 'C:/xampp/htdocs/php/src/Page/Admin/uploads/';
            $destPath = $uploadFileDir . $fileName;
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $productImage = $fileName; // Update the image path only if a new image is uploaded
            } else {
                echo "Error moving the file.<br>";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.<br>";
        }
    }

    // Update the product details including the image if a new one is uploaded
    $sql = "UPDATE products SET 
            productName = '$productName', 
            productPrice = '$productPrice', 
            productQty = '$productQty', 
            productImage = '$productImage'
            WHERE productID = $productId";
    
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    } else {
        echo "Record updated successfully "; 
    }
}

// Handle record deletion
if (isset($_GET['delete_id'])) {
    $deleteId = $conn->real_escape_string($_GET['delete_id']);
    $sql = "DELETE FROM products WHERE productID = $deleteId";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    } else {
        echo "Record deleted successfully<br>";
    }
}

// Check if 'fetch_id' parameter is set in the URL
if (isset($_GET['fetch_id'])) {
    // Sanitize the fetch ID to ensure it's an integer
    $fetchId = intval($_GET['fetch_id']);

    // Prepare SQL query using prepared statements to prevent SQL injection
    $sql = "SELECT * FROM products WHERE productID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $fetchId); // "i" denotes integer type
    $stmt->execute();
    $result = $stmt->get_result();

    // Set content type to JSON
    header('Content-Type: application/json');

    // Check if a product was found
    if ($result->num_rows > 0) {
        // Fetch the product details and return as JSON
        echo json_encode($result->fetch_assoc());
    } else {
        // Return an error message if no product is found
        echo json_encode(array('error' => 'Product not found'));
    }

  
    
    // Exit script to prevent further execution
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin input</title>
    <!-- Import Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    /* Custom styles for modal positioning */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fefefe;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        max-width: 600px;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    </style>
</head>

<body class="bg-gray-100 p-6">

    <!-- Trigger Button -->
    <div class="mb-4  flex justify-between">
        <div>
            <button id="addProductBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg mr-2">Add Product</button>

            <input type="text" id="searchById" placeholder="Search by ID"
                class="border border-gray-300 px-4 py-2 rounded-lg mr-2">
            <input type="text" id="searchByName" placeholder="Search by Name"
                class="border border-gray-300 px-4 py-2 rounded-lg mr-2">
            <button id="searchButton" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Search</button>
        </div>
        <div class="flex flex-col gap-1  items-end">
            <button id="logout" class=" bg-blue-500 rounded-md px-4 py-2 w-20 items-end ">logout</button>
            <!-- Welcome message -->
        </div>
    </div>
    <!-- comfirm delete product -->

    <div id="confirmationModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center hidden">
        <div class="bg-white p-4 rounded shadow-lg max-w-sm w-full">
            <h2 class="text-lg font-semibold mb-4">Confirm Deletion</h2>
            <p class="mb-4">Are you sure you want to delete this product?</p>
            <div class="flex justify-end space-x-2">
                <button id="confirmDelete" class="bg-red-500 text-white px-4 py-2 rounded-lg">Delete</button>
                <button id="cancelDelete" class="bg-gray-300 px-4 py-2 rounded-lg">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div id="addProductModal" class="modal">
        <div class="modal-content">
            <button class="close-modal absolute top-2 right-2 text-gray-600 text-2xl">&times;</button>
            <h2 class="text-xl font-semibold mb-4">Add Product</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="text_name" class="block text-gray-700">Product Name</label>
                    <input type="text" name="text_name" id="text_name" class="w-full border border-gray-300 p-2 rounded"
                        required>
                </div>
                <div class="mb-4">
                    <label for="text_price" class="block text-gray-700">Product Price</label>
                    <input type="text" name="text_price" id="text_price"
                        class="w-full border border-gray-300 p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="text_qty" class="block text-gray-700">Product Quantity</label>
                    <input type="text" name="text_qty" id="text_qty" class="w-full border border-gray-300 p-2 rounded"
                        required>
                </div>
                <div class="mb-4">
                    <label for="text_image" class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
                    <div id="drop-zone"
                        class="border-2 border-dashed border-gray-300 p-6 rounded-md text-center cursor-pointer hover:border-blue-500 hover:bg-blue-50">
                        <p>Drag & drop an image here or click to select</p>
                        <input type="file" name="text_image" id="text_image" accept="image/*" class="hidden">
                        <img id="preview" class="preview-img mt-4 max-w-xs max-h-20 mx-auto" src="" alt="Image preview"
                            style="display: none;">
                    </div>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Add Product</button>
            </form>
        </div>
    </div>

    <!-- Table for displaying products -->
    <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead class="bg-gray-200">
            <tr>
                <th class="border-b px-4 py-2 text-center">ID</th>
                <th class="border-b px-4 py-2 text-center">Name</th>
                <th class="border-b px-4 py-2 text-center">Price</th>
                <th class="border-b px-4 py-2 text-center">Quantity</th>
                <th class="border-b px-4 py-2 text-center">Image</th>
                <th class="border-b px-4 py-2 text-center">Actions</th>
            </tr>
        </thead>
        <tbody id="productTableBody">
            <?php
        // Fetch all products initially
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td class='border-b px-4 py-2 text-center'>{$row['productID']}</td>
                    <td class='border-b px-4 py-2 text-center'>{$row['productName']}</td>
                    <td class='border-b px-4 py-2 text-center'>{$row['productPrice']}</td>
                    <td class='border-b px-4 py-2 text-center'>{$row['productQty']}</td>
                    <td class='border-b px-4 py-2 text-center'><img src='/php/src/Page/Admin/uploads/{$row['productImage']}' alt='{$row['productName']}' class='w-20 h-20 object-fit mx-auto'></td>
                    <td class='border-b px-4 py-2 text-center'>
                     <div class='flex justify-center space-x-4'>
                            <button class='edit-btn bg-blue-500 text-white px-4 py-2 rounded-lg' data-id='{$row['productID']}'>Edit</button>
                            <button class='delete-btn bg-red-500 text-white px-4 py-2 rounded-lg' data-url='?delete_id={$row['productID']}'>Delete</button>
                        </div>
                        </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='border-b px-4 py-2 text-center'>No products found</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <!-- Edit Modal   -->
    <div id="editProductModal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Edit Product</h2>
                <span class="close-modal text-gray-600 cursor-pointer text-2xl">&times;</span>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="edit_id" id="edit_id">
                <div class="mb-4">
                    <label for="edit_name" class="block text-gray-700">Product Name</label>
                    <input type="text" name="edit_name" id="edit_name" class="w-full border border-gray-300 p-2 rounded"
                        required>
                </div>
                <div class="mb-4">
                    <label for="edit_price" class="block text-gray-700">Product Price</label>
                    <input type="text" name="edit_price" id="edit_price"
                        class="w-full border border-gray-300 p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="edit_qty" class="block text-gray-700">Product Quantity</label>
                    <input type="text" name="edit_qty" id="edit_qty" class="w-full border border-gray-300 p-2 rounded"
                        required>
                </div>
                <div class="drop-zone border-dashed border-2 border-gray-300 p-4 rounded mb-4 text-center cursor-pointer flex flex-col items-center"
                    id="edit-drop-zone">
                    <p class="text-gray-600">Drag & drop a new image here, or click to select</p>
                    <input type="file" name="edit_image" id="edit_image" class="hidden">
                    <img id="edit-preview" class="preview-img max-w-xs mt-4 max-h-20" src="" alt="Image preview"
                        style="display: none;">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update Product</button>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const addProductModal = document.getElementById('addProductModal');
        const editProductModal = document.getElementById('editProductModal');
        const confirmationModal = document.getElementById('confirmationModal');
        const closeModalButtons = document.querySelectorAll('.close-modal');
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('text_image');
        const preview = document.getElementById('preview');

        const editDropZone = document.getElementById('edit-drop-zone');
        const editFileInput = document.getElementById('edit_image');
        const editPreview = document.getElementById('edit-preview');

        // Function to handle Add Product functionality
        function addProduct() {
            document.getElementById('addProductBtn').addEventListener('click', () => {
                addProductModal.style.display = 'block';
            });
        }

        // Function to handle Edit Product functionality
        function editProduct() {
                const editProductModal = document.getElementById('editProductModal');
                const editPreview = document.getElementById('edit-preview'); // Correct image preview element
                const closeModal = editProductModal.querySelector('.close-modal'); // Close button reference for the specific modal

                // Add click event to all edit buttons
                document.querySelectorAll('.edit-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const productId = e.target.getAttribute('data-id');
                        
                        // Fetch the product data for the specified ID
                        fetch(`?fetch_id=${productId}`)
                            .then(response => response.text())  // Fetch as text to inspect the raw content
                            .then(data => {
                                console.log('Raw text response:', data);  // Log raw response content
                                try {
                                    const jsonData = JSON.parse(data);  // Try parsing the text as JSON

                                    // Check if the response contains an error
                                    if (jsonData.error) {
                                        alert(jsonData.error);
                                    } else {
                                        // Populate the edit modal fields with the fetched data
                                        document.getElementById('edit_id').value = jsonData.productID;
                                        document.getElementById('edit_name').value = jsonData.productName;
                                        document.getElementById('edit_price').value = jsonData.productPrice;
                                        document.getElementById('edit_qty').value = jsonData.productQty;

                                        // Handle image preview display
                                        if (jsonData.productImage) {
                                            editPreview.src = `http://localhost/php/src/Page/Admin/uploads/${jsonData.productImage}`;
                                            editPreview.style.display = 'block';
                                        } else {
                                            editPreview.style.display = 'none';
                                        }

                                        // Show the edit modal
                                        editProductModal.style.display = 'block';
                                    }
                                } catch (error) {
                                    console.error('Error parsing JSON:', error);
                                    alert('An error occurred while processing the product details.');
                                }
                            })
                            .catch(err => {
                                console.error('Error fetching product data:', err);
                                alert('An error occurred while fetching product details.');
                            });
                    });
                });

                // Close modal functionality
                closeModal.addEventListener('click', () => {
                    editProductModal.style.display = 'none';
                });

                // Close the modal when clicking outside of it
                window.addEventListener('click', (event) => {
                    if (event.target === editProductModal) {
                        editProductModal.style.display = 'none';
                    }
                });
}

        // Ensure that the function is called when the page loads
        document.addEventListener('DOMContentLoaded', editProduct);

        // Function to handle Delete Product functionality
        function deleteProduct() {
            const confirmDeleteButton = document.getElementById('confirmDelete');
            const cancelDeleteButton = document.getElementById('cancelDelete');
            let deleteUrl = '';

            // Show the modal and set the delete URL
            function showDeleteModal(url) {
                deleteUrl = url;
                confirmationModal.classList.remove('hidden');
            }

            // Confirm deletion
            confirmDeleteButton.addEventListener('click', () => {
                window.location.href = deleteUrl; // Redirect to delete URL
            });

            // Cancel deletion
            cancelDeleteButton.addEventListener('click', () => {
                confirmationModal.classList.add('hidden');
            });

            // Attach click events to delete buttons
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    showDeleteModal(e.target.getAttribute('data-url'));
                });
            });
        }

        // Function to handle Search Product functionality
        function searchProduct() {
            const searchByIdInput = document.getElementById('searchById');
            const searchByNameInput = document.getElementById('searchByName');
            const searchButton = document.getElementById('searchButton');
            const productTableBody = document.getElementById('productTableBody');

            // Function to filter table rows based on search inputs
            function filterTable() {
                const idQuery = searchByIdInput.value.trim().toLowerCase();
                const nameQuery = searchByNameInput.value.trim().toLowerCase();
                const rows = productTableBody.getElementsByTagName('tr');

                for (let row of rows) {
                    const idCell = row.cells[0].innerText.toLowerCase();
                    const nameCell = row.cells[1].innerText.toLowerCase();
                    const idMatch = idQuery === '' || idCell.includes(idQuery);
                    const nameMatch = nameQuery === '' || nameCell.includes(nameQuery);

                    row.style.display = (idMatch && nameMatch) ? '' : 'none'; // Show or hide row
                }
            }

            // Handle search button click
            searchButton.addEventListener('click', filterTable);

            // Optional: Allow pressing Enter to trigger search
            searchByIdInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') filterTable();
            });

            searchByNameInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') filterTable();
            });
        }

        // Function to handle file input and preview functionality
        function handleFileInput(dropZoneElem, fileInputElem, previewElem) {
            // Handle click to open file input
            dropZoneElem.addEventListener('click', () => {
                fileInputElem.click();
            });

            // Handle file input change
            fileInputElem.addEventListener('change', () => {
                const file = fileInputElem.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        previewElem.src = event.target.result;
                        previewElem.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Handle drag-over and drag-leave styling
            dropZoneElem.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZoneElem.classList.add('border-blue-500', 'bg-blue-50');
            });

            dropZoneElem.addEventListener('dragleave', () => {
                dropZoneElem.classList.remove('border-blue-500', 'bg-blue-50');
            });

            // Handle file drop
            dropZoneElem.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZoneElem.classList.remove('border-blue-500', 'bg-blue-50');
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    fileInputElem.files = files; // Assign files to file input
                    const file = files[0];
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        previewElem.src = event.target.result;
                        previewElem.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Function to close modals
        function closeModal() {
            closeModalButtons.forEach(button => {
                button.addEventListener('click', () => {
                    addProductModal.style.display = 'none'; // Close Add Product Modal
                    editProductModal.style.display = 'none'; // Close Edit Product Modal
                    confirmationModal.classList.add('hidden'); // Close Confirmation Modal
                });
            });

            // Close modals when clicking outside of the modal
            window.addEventListener('click', (event) => {
                if (event.target === addProductModal) {
                    addProductModal.style.display = 'none';
                }
                if (event.target === editProductModal) {
                    editProductModal.style.display = 'none';
                }
                if (event.target === confirmationModal) {
                    confirmationModal.classList.add('hidden');
                }
            });
        }

        // Call functions to initialize functionalities
        addProduct();
        editProduct();
        deleteProduct();
        searchProduct();
        closeModal(); // Initialize close modal functionality

        // Initialize file input handlers
        handleFileInput(dropZone, fileInput, preview);
        handleFileInput(editDropZone, editFileInput, editPreview);
    });
</script>



</body>

</html>