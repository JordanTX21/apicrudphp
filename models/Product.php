<?php
class Product {
    private $conn;
    private $table = 'productos';

    public $id;
    public $nombre;
    public $descripcion;
    public $precio;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Métodos CRUD
    // Ejemplo de método para crear un nuevo producto
    public function create() {
        $query = 'INSERT INTO ' . $this->table . '
                  SET
                    nombre = :nombre,
                    descripcion = :descripcion,
                    precio = :precio';

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->precio = htmlspecialchars(strip_tags($this->precio));

        // Bind de los parámetros
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':precio', $this->precio);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Otros métodos CRUD: read, update, delete
    // Implementar según sea necesario
}