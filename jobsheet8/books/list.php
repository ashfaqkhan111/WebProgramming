<?php

session_start();

require __DIR__ . '/../includes/connection.php';

$bookList = $pdo ->query ("select * from books order by id desc") ->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../includes/header.php';

?>

<section>

    <h2>Book List</h2>

    <?php
    if (!empty($_SESSION['flash'])): ?>

    <div class="<?=  htmlspecialchars($_SESSION['flash']['type']) ?>">
        <?= htmlspecialchars($_SESSION['flash']['message']) ?>
        
    </div>
    <?php unset($_SESSION['flash']); ?>

    <?php endif; ?>
    

    <div class="search-box">

        <label for="search-input">
            Search Book Title
        </label>

        <input
            type="text"
            id="search-input"
            placeholder="Type book title..."
        >

    </div>

    <div class="table-responsive">

        <table>

            <thead>

                <tr>

                    <th>Title</th>

                    <th>Author</th>

                    <th>Year</th>

                    <th>Stock</th>
                    
                    <th>ISBN</th>

                    <th>Category</th>

                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

                <?php if (empty($bookList)): ?>

                    <tr>

                        <td colspan="5">
                            There is no book data yet.
                            Please add it using the "Add Book" menu.
                        </td>

                    </tr>

                <?php else: ?>

                    <?php foreach ($bookList as $book): ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($book['title']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($book['author'])?>
                            </td>

                            <td>
                                <?= htmlspecialchars($book['year']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($book['stock']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($book['isbn']) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars('category') ?>
                            </td>

                            <td>
                                <button type="button">
                                    Edit
                                </button>

                                <button type="button" class="btn-delete">
                                    Delete
                                </button>
                            </td>

                            
                        </tr>
                    <?php endforeach ?>
                <?php endif; ?>

            </tbody>

        </table>

    </div>

</section>

<?php

include __DIR__ . '/../includes/footer.php';

?>