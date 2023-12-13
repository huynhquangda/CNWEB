<?php
namespace CT275\Labs;

use PDO;

class Cart
{
    private ?PDO $db;
    private int $id = 0;
    public int $idUser;
    public int $product_id;
    private array $products = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function __construct(?PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;

        if ($this->db) {

            $query = "INSERT INTO carts (product_id, id,user_id) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$product->getId(), $this->id, $this->idUser]);
        }
    }

    public function removeProduct(Product $product): void
    {
        $index = array_search($product, $this->products);
        if ($index !== false) {
            unset($this->products[$index]);
        }
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function getProductsCount(): int
    {
        return count($this->products);
    }

    public function getTotalPrice(): float
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $totalPrice += $product->price;
        }
        return $totalPrice;
    }
    public function loadAllCarts(): array
    {
        $carts = [];

        if ($this->db) {
            $query = "SELECT * FROM carts WHERE user_id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$this->idUser]);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cart = new Cart($this->db);
                $cart->id = $row['id'];
                $cart->idUser = $row['user_id'];
                $cart->product_id = $row['product_id'];

                $carts[] = $cart;
            }
        }

        return $carts;
    }
    // public function loadCartsByUserId(int $userId): array
    // {
    //     $carts = [];

    //     if ($this->db) {
    //         $query = "SELECT * FROM carts WHERE user_id = ?";
    //         $stmt = $this->db->prepare($query);
    //         $stmt->execute([$userId]);

    //         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //             $cart = new Cart($this->db);
    //             $cart->id = $row['id'];
    //             $cart->idUser = $row['user_id'];
    //             $cart->product_id = $row['product_id'];

    //             $carts[] = $cart;
    //         }
    //     }

    //     return $carts;
    // }
    // Other methods related to cart functionality can be added here
    public function loadCartsByUserId(int $userId): array
    {
        $carts = [];

        if ($this->db) {
            $query = "SELECT c.id, c.user_id, c.product_id, p.name, p.price,p.created_at,p.image
                  FROM carts c
                  JOIN products p ON c.product_id = p.id
                  WHERE c.user_id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$userId]);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cart = new Cart($this->db);
                $cart->id = $row['id'];
                $cart->idUser = $row['user_id'];
                $cart->product_id = $row['product_id'];
                $cart->product_name = $row['name'];
                $cart->product_price = $row['price'];
                $cart->created_at = $row['created_at'];
                $cart->product_image = $row['image'];

                $carts[] = $cart;
            }
        }

        return $carts;
    }

}