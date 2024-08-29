<?php
session_start();
include '../config/functions.php';
redirectIfNotLoggedIn();
$page = "All Papers";
include 'layouts/header.php';
include 'layouts/navbar.php';
?>
<body class="bg">
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h4>Are you sure?</h4>
    </div>
    <div class="modal-footer">
        <form action="routes/papers" method="POST">
            <input type="hidden" id="paperIdToDelete" name="paperIdToDelete">
            <button class="modal-close dw-green-1 waves-effect waves-green btn-flat white-text" name="deleteModal">
                YES
            </button>
            <button class="modal-close red darken-2 waves-effect waves-green btn-flat white-text" onclick="e.preventDefault()">
                NO
            </button>
        </form>
    </div>
</div>
<main>
    <br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col l12">
                <div class="card">
                    <div class="card-tabs">
                        <ul class="tabs tabs-fixed-width">
                            <li class="tab dw-blue-2">
                                <a class="left-align white-text center-align">
                                    <h6>All Papers</h6>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <table>
                                <thead>
                                    <th> S. No. </th>
                                    <th> Title </th>
                                    <th> Delete </th>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 1;
                                    $papers = getAllPapers($conn);
                                    foreach ($papers as $paper) {
                                ?>
                                    <tr>
                                        <td> <?php echo $i++; ?></td>
                                        <td>
                                            <a href="paper?t=<?php echo getFormattedName($paper['title']);?>" target="_blank">
                                                <?php echo $paper['title']; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="POST">
                                                <a class="btn btn-floating red darken-1" onclick="confirmDeletePaper(<?php echo $paper['id']; ?>)"><i class="small material-icons">delete</i></a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>

