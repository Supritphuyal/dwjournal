<?php
session_start();
include '../config/functions.php';
redirectIfNotLoggedIn();
$page = "Volumes";
include 'layouts/header.php';
include 'layouts/navbar.php';
?>
<body class="bg">
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h4>Are you sure?</h4>
    </div>
    <div class="modal-footer">
        <form action="routes/volumes" method="POST">
            <input type="hidden" id="volumeIdToDelete" name="volumeIdToDelete">
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
    <?php if(isset($_POST['add'])){ ?>
        <div class="container">
            <div class="row">
                <div class="col l12">
                    <div class="card">
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab dw-blue-2">
                                    <a class="left-align white-text center-align">
                                        <h6>Add Volumes</h6>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <form action="routes/volumes" METHOD="POST" autocomplete="off">
                                    <div class="input-field col l12 m12 s12">
                                        <i class="material-icons prefix">book</i>
                                        <input id="newVolumeNumber" name="volumeNumber" type="number" class="validate" required>
                                        <label for="newVolumeNumber"> Write the volume number here </label>
                                    </div>
                                    <div class="input-field col l12 m12 s12">
                                        <i class="material-icons prefix">event</i>
                                        <input id="newVolumeDate" name="volumeDate" type="text" class="datepicker" required>
                                        <label for="newVolumeDate">Select the publish date here </label>
                                    </div>
                                    <div class="input-field col l12 m12 s12 center-align">
                                        <input type="submit" name="addVolume" class="btn btn-float dw-blue-1" value="Add">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } elseif (isset($_POST['edit'])) { ?>
        <?php $volumeToEdit = getVolume($conn, strip_tags($_POST['volumeToEdit'])); ?>
        <div class="container">
            <div class="row">
                <div class="col l12">
                    <div class="card">
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab dw-blue-2">
                                    <a class="left-align white-text center-align">
                                        <h6>Edit</h6>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <form action="routes/volumes" METHOD="POST" autocomplete="off">
                                    <input type="hidden" value="<?php echo $volumeToEdit; ?>" name="volumeToEdit">
                                    <div class="input-field col l12 m12 s12">
                                        <i class="material-icons prefix">book</i>
                                        <input id="volumeNumber" name="volumeNumber" type="number" class="validate" required value="<?php echo $volumeToEdit[0]['volume_number']; ?>">
                                        <label for="volumeNumber"> Edit the volume number here </label>
                                    </div>
                                    <div class="input-field col l12 m12 s12">
                                        <i class="material-icons prefix">event</i>
                                        <input id="volumeDate" name="volumeDate" type="text" class="datepicker" required value="<?php echo $volumeToEdit[0]['publish_date']; ?>">
                                        <label for="volumeDate">Select the publish date here </label>
                                    </div>
                                    <div class="input-field col l12 m12 s12 center-align">
                                        <input type="submit" name="editVolume" class="btn btn-float dw-blue-1" value="Edit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col l2 offset-l10">
                    <form method="POST">
                        <button class="btn dw-blue-1 right modal-trigger" name="add"> Add New </button>
                    </form>
                </div>
                <div class="col l12">
                    <div class="card">
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab dw-blue-2">
                                    <a class="left-align white-text center-align">
                                        <h6>All Volumes</h6>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <table>
                                    <thead>
                                        <th> S. No. </th>
                                        <th> Volume Number </th>
                                        <th> Publish Date </th>
                                        <th> Paper Count </th>
                                        <th> Change Status </th>
                                        <th> Actions </th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    $volumes = getAllVolumes($conn);
                                    foreach ($volumes as $volume) {
                                        ?>
                                        <tr>
                                            <td> <?php echo $i++; ?></td>
                                            <td> <?php echo "VOLUME " . integerToRoman($volume['volume_number']); ?> </td>
                                            <td> <?php echo $volume['publish_date']; ?> </td>
                                            <td>
                                                <?php $paperCount = getPapersCountByVolume($conn, $volume['id']);
                                                if ($paperCount) { echo $paperCount; } else { echo "0"; } ?> </td>
                                            <td>
                                                <?php if($volume['enabled']){ ?>
                                                    <a href="routes/volumes?v=<?php echo $volume['id']; ?>&e=<?php echo $volume['enabled']; ?>&changeStatus=true" class="btn red darken-1"> Disable </a>
                                                <?php } else { ?>
                                                    <a href="routes/volumes?v=<?php echo $volume['id']; ?>&e=<?php echo $volume['enabled']; ?>&changeStatus=true" class="btn dw-green-1"> Enable </a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <form method="POST">
                                                    <input type="hidden" value="<?php echo $volume['id']; ?>" name="volumeToEdit">
                                                    <button class="btn btn-floating dw-green-1" name="edit"><i class="small material-icons">edit</i></button>
                                                    <a class="btn btn-floating red darken-1" onclick="confirmDeleteVolume(<?php echo $volume['id']; ?>)"><i class="small material-icons">delete</i></a>
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
    <?php } ?>
</main>
</body>

