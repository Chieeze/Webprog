<?php

session_start();

if (isset($_SESSION['account'])) {
    if ($_SESSION['account']['role'] == 'customer') {
        header('Location: customerPage.php');
    }
} else {
    header('location: login.php');
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Forms</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="./index.html">Home</a></li>
                <li><a href="./addbook.html">Add Book</a></li>
                <li><a href="./login.html">Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Add a New Book to the Library</h1>
        <section>
            <form action="" method="post">
                <div>
                    <label for="book-title">Book Title</label>
                    <br>
                    <input type="text" name="book-title" id="book-title" required="" placeholder="Enter Book Title">
                </div>
                <div>
                    <label for="author">Author's Name</label>
                    <br>
                    <input type="text" name="author" id="author" required="" placeholder="Enter Lead Author's Name">
                </div>
                <div>
                    <label for="genre">Genre</label>
                    <br>
                    <select name="genre" id="genre" required="">
                        <option value="">--Select--</option>
                        <option value="Fiction">Fiction</option>
                        <option value="Math">Math</option>
                        <option value="Science">Science</option>
                        <option value="History">History</option>
                    </select>
                </div>
                <div>
                    <label for="publisher">Publisher</label>
                    <br>
                    <input type="text" name="publisher" id="publisher" required=""
                        placeholder="Enter Publisher's Company Name">
                </div>
                <div>
                    <label for="publication-date">Publication Date</label>
                    <br>
                    <input type="date" name="publication-date" id="publication-date" required="">
                </div>
                <div>
                    <label for="edition">Edition</label>
                    <br>
                    <input type="number" name="edition" id="edition" min="1" step="1"
                        placeholder="Enter Edition Number">
                </div>
                <div>
                    <label for="copies">Number of Copies</label>
                    <br>
                    <input type="number" name="copies" id="copies" min="0" step="10" required=""
                        placeholder="Enter number of available copies">
                </div>
                <div>
                    <label for="format">Format</label>
                    <br>
                    <input type="radio" name="format" id="Hardbound" value="Hardbound" required="">
                    <span>Hardbound</span>
                    <input type="radio" name="format" id="Softbound" value="Softbound">
                    <span>Softbound</span>
                </div>
                <div>
                    <label for="age-group">Age Group</label>
                    <br>
                    <input type="checkbox" name="age-group[]" id="Kids" value="Kids" checked="">
                    <span>Kids</span>
                    <input type="checkbox" name="age-group[]" id="Teens" value="Teens" checked="">
                    <span>Teens</span>
                    <input type="checkbox" name="age-group[]" id="Adult" value="Adult" checked="">
                    <span>Adult</span>
                </div>
                <div>
                    <label for="rating">Book Rating</label>
                    <br>
                    <span>1 star</span>
                    <input type="range" name="rating" id="rating" value="5" min="1" max="5" required="">
                    <span>5 star</span>
                </div>
                <div>
                    <label for="description">Description</label>
                    <br>
                    <textarea name="description" id="description" cols="30" rows="10"
                        placeholder="Describe this book (optional)"></textarea>
                </div>
                <div>
                    <input type="submit" value="Save Book">
                </div>
            </form>
        </section>
    </main>
    <footer>
        <p>Jaydee C. Ballaho</p>
    </footer>

</body>

</html>