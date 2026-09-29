<?php
session_start();

$page_title = "Member List";
require __DIR__ . '/../includes/connection.php';



$flash = $_SESSION['flash'] ?? null;

unset($_SESSION['flash']);

$memberList = $pdo->query("select member_number, name, address, phone_number from member order by id DESC")->fetchAll(pdo::FETCH_ASSOC);

include __DIR__ . '/../includes/header.php';
?>

<section>

    <h2>Member List</h2>

    <?php if ($flash): ?>

        <p class="flash flash-<?php echo $flash['type']; ?>">
            <?php echo $flash['message']; ?>
        </p>

    <?php endif; ?>

    <div class="table-responsive">

        <table>

            <thead>

                <tr>

                    <th>Member Number</th>

                    <th>Name</th>

                    <th>Address</th>

                    <th>Phone Number</th>

                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                <?php if (empty($memberList)): ?>

                    <tr>

                        <td colspan="5">
                            There is no member data yet.
                            Please add it using the "Add Member" menu.
                        </td>

                    </tr>

                <?php else: ?>

                    <?php foreach ($memberList as $member): ?>

                        <tr>

                            <td>
                                <?php echo $member['member_no']; ?>
                            </td>

                            <td>
                                <?php echo $member['name']; ?>
                            </td>

                            <td>
                                <?php echo $member['address']; ?>
                            </td>

                            <td>
                                <?php echo $member['phone']; ?>
                            </td>

                            <td>

                                <button type="button">
                                    Edit
                                </button>

                                <button
                                    type="button"
                                    class="btn-delete"
                                >
                                    Delete
                                </button>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</section>

<?php

include __DIR__ . '/../includes/footer.php';

?>