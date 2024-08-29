<?php
session_start();
$page = "Dashboard";
include 'layouts/header.php';
include 'layouts/navbar.php';
include '../config/functions.php';
redirectIfNotLoggedIn();
?>
<script type="text/javascript">
    $(document).ready(function() {
        getAuthorList();

        ClassicEditor
            .create(document.querySelector('#abstract'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            .catch(error => {
                console.log(error);
            });
        ClassicEditor
            .create(document.querySelector('#references'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            .catch(error => {
                console.log(error);
            });
    });
</script>
<div id="addNewAuthor" class="modal">
        <div class="modal-content">
            <h4>Add New Author</h4>
            <form autocomplete="off">
                <div class="input-field col l12 m12 s12">
                    <i class="material-icons prefix">person_add</i>
                    <input id="newAuthorName" name="authorName" type="text" class="validate">
                    <label for="newAuthorName">Write the author name here</label>
                </div>
                <div class="input-field col l12 m12 s12">
                    <i class="material-icons prefix">house</i>
                    <input id="newAuthorAffiliation" name="authorAffiliation" type="text" class="validate" required>
                    <label for="newAuthorAffiliation">Write the author affiliation here </label>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="modal-close dw-green-1 waves-effect waves-green btn-flat white-text" onclick="addNewAuthor();">
                ADD
            </button>
        </div>
</div>
<body class="bg">
<main>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col l12">
                <div class="card">
                    <div class="card-tabs">
                        <ul class="tabs tabs-fixed-width">
                            <li class="tab dw-blue-2">
                                <a class="left-align white-text center-align">
                                    <h6>Upload New Paper</h6>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-content">
                        <div class="row">

                            <form class="col s12" enctype="multipart/form-data" action="routes/papers" method="POST" autocomplete="off" onsubmit="return validateUser();">
                                <div class="row">

                                    <div class="input-field col l12 m12 s12">
                                        <i class="material-icons prefix">title</i>
                                        <input id="paperTitle" name="paperTitle" type="text" class="validate" required>
                                        <label for="paperTitle"> Write the paper title here </label>
                                    </div>

                                    <div class="input-field col l12 m12 s12">
                                        <i class="material-icons prefix">book</i>
                                        <select id="volume" name="paperVolume">
                                            <option selected disabled> Choose an option </option>
                                            <?php
                                            $volumes = getAllVolumes($conn);
                                            foreach($volumes as $volume) {
                                                if ($volume['enabled']){
                                                ?>
                                                <option value="<?php echo $volume['id']; ?>"><?php echo "VOLUME ". integerToRoman($volume['volume_number']); ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                        <label for="volume"> Select the volume here </label>
                                    </div>

                                    <div class="input-field col l10 m10 s10">
                                        <i class="material-icons prefix">person_add</i>
                                        <select id="authorList" class="authorList" name="authors[]">
                                        </select>
                                        <label for="authorList">Select name of author here</label>
                                    </div>
                                    <div class="input-field col l2 m2 s2">
                                        <a class="btn dw-blue-1 btn-floating tooltipped"
                                                data-position="bottom" data-tooltip="Select new author"
                                                    onclick="addNewSelectAuthorInput();">
                                            <i class="material-icons">group_add</i>
                                        </a>
                                        <a class="btn dw-green-1 btn-floating tooltipped modal-trigger"
                                                data-target="addNewAuthor"
                                                data-position="top" data-tooltip="Add new author">
                                            <i class="material-icons">add</i>
                                        </a>
                                    </div>
                                    <div id="authorInput"></div>
                                    <div class="input-field col l12 m12 s12">
                                        <i class="material-icons prefix">grade</i>
                                        <input id="paperKeywords" name="paperKeywords" type="text" class="validate" required>
                                        <label for="paperKeywords"> Write the paper keywords here </label>
                                    </div>
                                    <div class="col l12 m12 s12">
                                        <h6>ABSTRACT</h6>
                                        <textarea id="abstract" class="textarea-ckeditor" name="paperAbstract"></textarea>
                                    </div>
                                    <div class="col l12 m12 s12">
                                        <h6>REFERENCES</h6>
                                        <textarea id="references" class="textarea-ckeditor" name="paperReferences"></textarea>
                                    </div>

                                    <div class="file-field input-field col l12 s12 m12">
                                        <div class="btn dw-blue-1">
                                            <span>Paper</span>
                                            <input type="file" name="paper" accept="application/pdf" required>
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text"
                                                   placeholder="Click here to select paper"/>
                                        </div>
                                    </div>

                                    <div class="input-field col l12 m12 s12 center-align">
                                        <input type="submit" name="uploadPaper" class="btn btn-float dw-blue-1" value="Upload">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
<?php include 'layouts/footer.php' ?>
