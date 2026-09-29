<?php

$page_title = "Add Member";
require __DIR__. '/../includes/connection.php';

include __DIR__ . '/../includes/header.php';

?>

<section>

    <h2>Add Member</h2>

    <form method="post" action="addMember_process.php">

        <p>

            <label for="member_no">
                Member Number
            </label><br>

            <input
                type="text"
                id="member_no"
                name="member_no"
                required
            >

        </p>

        <p>

            <label for="name">
                Name
            </label><br>

            <input
                type="text"
                id="name"
                name="name"
                required
            >

        </p>

        <p>

            <label for="address">
                Address
            </label><br>

            <input
                type="text"
                id="address"
                name="address"
            >

        </p>

        <p>

            <label for="phone">
                Phone Number
            </label><br>

            <input
                type="text"
                id="phone"
                name="phone"
            >

        </p>

        <p>

            <button type="submit">
                Save
            </button>

        </p>

    </form>

</section>

<?php

include __DIR__ . '/../includes/footer.php';

?>