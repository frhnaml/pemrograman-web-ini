<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "dbbarbershop";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id = isset($_GET['id']) ? $_GET['id'] : null;


$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if ($id) {
            
            $sql = "SELECT id, title, description, img FROM service WHERE id = $id";
        } else {
            
            $sql = "SELECT id, title, description, img FROM service";
        }
        
        $result = $conn->query($sql);
        $items = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $row['img'] = '/mdl4web/tugas/assets/' . $row['img'];
                $items[] = $row;
            }
            echo json_encode($items);
        } else {
            echo json_encode([]);
        }
        break;

    case 'POST':
        
        $data = json_decode(file_get_contents('php://input'), true);
        $title = $data['title'];
        $description = $data['description'];
        $img = $data['img'];

        $sql = "INSERT INTO service (title, description, img) 
                VALUES ('$title', '$description', '$img')";
        
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['message' => 'Item added successfully']);
        } else {
            echo json_encode(['message' => 'Error adding item: ' . $conn->error]);
        }
        break;

    case 'PUT':
        
        if ($id) {
            $data = json_decode(file_get_contents('php://input'), true);
            $title = $data['title'];
            $description = $data['description'];
            $img = $data['img'];

            $sql = "UPDATE service SET title = '$title', description = '$description', img = '$img' WHERE id = $id";
            
            if ($conn->query($sql) === TRUE) {
                echo json_encode(['message' => 'Item updated successfully']);
            } else {
                echo json_encode(['message' => 'Error updating item: ' . $conn->error]);
            }
        } else {
            echo json_encode(['message' => 'ID is required to update']);
        }
        break;

    case 'DELETE':
        
        if ($id) {
            $sql = "DELETE FROM service WHERE id = $id";
            
            if ($conn->query($sql) === TRUE) {
                echo json_encode(['message' => 'Item deleted successfully']);
            } else {
                echo json_encode(['message' => 'Error deleting item: ' . $conn->error]);
            }
        } else {
            echo json_encode(['message' => 'ID is required to delete']);
        }
        break;

    default:
        echo json_encode(['message' => 'Request method not supported']);
        break;
}

$conn->close();

?>