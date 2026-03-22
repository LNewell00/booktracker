<?php
require_once 'db.php';

$pdo = getDB();

try {
    // Publisher
    $pdo->exec("
        INSERT INTO Publisher (PublisherName, PublisherEmail)
        VALUES ('Penguin Random House', 'contact@penguinrandomhouse.com')
    ");

    // Genre
    $pdo->exec("
        INSERT INTO Genre (GenreName, GenreDesc)
        VALUES ('Fantasy', 'Stories involving magic, mythical creatures, and fictional worlds')
    ");

    // Author
    $pdo->exec("
        INSERT INTO Author (AuthorFName, AuthorLName)
        VALUES ('J.R.R.', 'Tolkien')
    ");

    // Book
    $pdo->exec("
        INSERT INTO Book (ISBN, BookTitle, BookDesc, BookReleaseDate, PublisherID, Finished)
        VALUES (9780261102354, 'The Fellowship of the Ring', 'The first part of The Lord of the Rings', '1954-07-29', 1000, FALSE)
    ");

    // Book_Author
    $pdo->exec("
        INSERT INTO Book_Author (AuthorID, ISBN)
        VALUES (10000, 9780261102354)
    ");

    // Book_Genre
    $pdo->exec("
        INSERT INTO Book_Genre (ISBN, GenreID)
        VALUES (9780261102354, 1)
    ");

    // AppUser
    $pdo->exec("
        INSERT INTO AppUser (UserFName, UserLName, UserEmail)
        VALUES ('Logan', 'Newell', 'logan@thenewells.net')
    ");

    // Wishlist
    $pdo->exec("
        INSERT INTO Wishlist (UserID, ISBN, NeedBook, Rank)
        VALUES (100000, 9780261102354, TRUE, 1)
    ");

    echo "Seeded successfully!";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>