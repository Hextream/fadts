<?php include VIEW.'includes/header.php' ?>

<?php include VIEW.'includes/sidebar.php' ?>

<div class="all_bacground_clor">
    <div class="SearchByCriteriaform1 ">

        <form id="form" action="post">
            <fieldset class="BackgroundFS">
                <h2> Disaster details</h2>
                </br>



                <div class="form-row">
                    <label for="select-disaster" class="detailsLable"><b>Select Disaster:</b></label>
                    <select name="select-disaster" id="select-disaster" class="form-control inputDetails"
                        name="disaster">
                        <option value="Flood" name="Flood">Flood</option>
                        <option value="LandSlide" name="LandSlide">LandSlide</option>
                        <option value="Fire" name="Fire">Fire</option>
                        <option value="Disaster1" name="Disaster1">Disaster1</option>
                    </select>
                </div>


                <div class="form-row">
                    <label for="select-disaster" class="detailsLable"><b>Disaster Date:</b></label>
                    <input class="form-control inputDetailsInput" id="Date" name="Date"></input>
                </div>



                <div class="form-row">
                    <label for="select-region" class="detailsLable"><b>Select Region:</b></label>
                    <select name="select-region" id="select-region" class="form-control inputDetails" name="region">
                        <option value="volvo">Colombo</option>
                        <option value="saab">Kaluthara</option>
                        <option value="mercedes">Gampaha</option>
                        <option value="audi">Mathara</option>
                    </select>
                </div>


                <button class='btn btn-primary location'>View Select Disaster</button>


            </fieldset>
        </form>

    </div>



</div>
<?php include VIEW.'includes/footer.php'?>