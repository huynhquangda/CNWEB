<?php

namespace CT275\Labs;

use PDO;

class Product
{
    private ?PDO $db;

    private int $id;
    public $name;
    public int $price;
    public $description;
    public $image;
    public $created_at;
    public $updated_at;
    public int $type;
    public int $choose;
    private array $errors = [];



    public function __construct(?PDO $pdo)
    {
        $this->db = $pdo;
        $this->type = 1;
        $this->choose = 1;
    }
    public function getId(): int
    {
        return $this->Id;
    }
    // public function setId(int $id): void
    // {
    //     $this->id = $id;
    // }


    public function count(): int
    {
        $statement = $this->db->prepare('select count(*) from products');
        $statement->execute();
        return $statement->fetchColumn();
    }

    public function getValidationErrors(): array
    {
        return $this->errors;
    }
    public function paginate(int $offset = 0, int $limit = 10): array
    {
        $products = [];
        $statement = $this->db->prepare('select * from products limit :offset,
:limit');
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->execute();
        while ($row = $statement->fetch()) {
            $product = new Product($this->db);
            $product->fillFromDB($row);
            $products[] = $product;
        }
        return $products;
    }
    public function fill(array $data): Product
    {
        $this->name = $data['name'] ?? '';
        $this->price = isset($data['price']) ? (int) $data['price'] : 0;
        $this->description = $data['description'] ?? '';

        $this->image = $data['image'] ?? '';

        return $this;
    }
    public function allProduct(): array
    {
        $contacts = [];
        $statement = $this->db->prepare('select * from products');
        $statement->execute();
        while ($row = $statement->fetch()) {
            $contact = new Product($this->db);
            $contact->fillFromDB($row);
            $contacts[] = $contact;
        }
        return $contacts;
    }
    public function validate(): bool
    {
        $name = trim($this->name);
        if (!$name) {
            $this->errors['name'] = 'Invalid name.';
        }

        $price = trim($this->price);
        if (!$price) {
            $this->errors['price'] = 'Invalid price.';
        }
        $description = trim($this->description);
        if (!$name) {
            $this->errors['descriotion'] = 'Invalid dé.';
        }



        return empty($this->errors);
    }
    protected function fillFromDB(array $row): Product
    {
        [
            'id' => $this->Id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'type' => $this->type,
            'choose' => $this->choose,
            'price' => $this->price,

        ] = $row;
        return $this;
    }

    public function findProduct(int $id): ?Product
    {
        $statement = $this->db->prepare('select * from products where id = :id');
        $statement->execute(['id' => $id]);
        if ($row = $statement->fetch()) {
            $this->fillFromDB($row);
            return $this;
        }
        return null;
    }

    public function save(): bool
    {
        $result = false;
        if ($this->Id >= 0) {
            $statement = $this->db->prepare(
                'update products set name = :name,
price = :price, image = :image,description = :description, type = :type,choose=:choose,updated_at = now()
where id = :id'
            );
            $result = $statement->execute([
                'name' => $this->name,
                'price' => $this->price,
                'image' => $this->image,
                'description' => $this->description,
                'type' => $this->type,
                'choose' => $this->choose,
                'id' => $this->Id
            ]);
        } else {
            //             $statement = $this->db->prepare(
//                 'insert into contacts (name, phone, notes, created_at, updated_at,email,password)
// values (:name, :phone, :notes, now(), now(), :email, :password)'
//             );
//             $result = $statement->execute([
//                 'name' => $this->name,
//                 'phone' => $this->phone,
//                 'notes' => $this->notes,
//                 'email' => $this->email,
//                 'password' => $this->password
//             ]);
//             if ($result) {
//                 $this->Id = $this->db->lastInsertId();
//             }
        }
        return $result;
    }
    public function addProduct(): bool
    {
        $result = false;
        $statement = $this->db->prepare(
            'insert into products (name, price, image, created_at, updated_at,description,type,choose)
values (:name, :price, :image, now(), now(),:description, :type,:choose)'
        );
        $result = $statement->execute([
            'name' => $this->name,
            'price' => $this->price,
            'image' => $this->image,

            'description' => $this->description,
            'type' => $this->type,
            'choose' => $this->choose,

        ]);
        if ($result) {
            $this->Id = $this->db->lastInsertId();
        }
        return $result;
    }
    public function update(array $data): bool
    {
        $this->fill($data);
        if ($this->validate()) {
            return $this->save();
        }
        return false;
    }
    public function delete(): bool
    {
        $statement = $this->db->prepare('delete from products where id = :id');
        return $statement->execute(['id' => $this->Id]);
    }


}