<?php

class Book
{
    private $title;
    private $author;
    private $price;

    public function __construct(string $title, string $author, float $price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    public function getTitle()
    {
        return $this->title;
    }

    protected function setTitle(string $title)
    {
        if (strlen($title) < 3) {
            throw new Exception("Title not valid!");
        }
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    protected function setAuthor(string $author)
    {
        $authorName = explode(" ", $author);
        $authorSecondName = $authorName[1];
        if (is_numeric($authorSecondName[0])) {
            throw new Exception("Author not valid!");
        }
        $this->author = $author;
    }

    public function getPrice()
    {
        return $this->price;
    }

    protected function setPrice($price)
    {
        if ($price <= 0) {
            throw new Exception("Price not valid!");
        }
        $this->price = $price;
    }

    public function __toString(): string
    {
        return "OK" . PHP_EOL . $this->getPrice() . PHP_EOL;
    }
}

class GoldenEditionBook extends Book
{
    public function __construct($title, $author, $price)
    {
        parent::__construct($title, $author, $price);
    }

    public function getPrice()
    {
        return parent::getPrice() * 1.3;
    }
}

$authorName = trim(fgets(STDIN));
$bookTitle = trim(fgets(STDIN));
$bookPrice = floatval(fgets(STDIN));
$bookType = trim(fgets(STDIN));

$book = null;

try {
    switch ($bookType) {
        case "STANDARD":
            $book = new Book($bookTitle, $authorName, $bookPrice);
            break;
        case "GOLD":
            $book = new GoldenEditionBook($bookTitle, $authorName, $bookPrice);
            break;
        default:
            throw new Exception("Type is not valid!");
    }
    echo $book;
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}