<?php 
include '_edit.php';
include 'session.php';
    ?>



<!-- MODALS -->


<!-- LOGIN MODAL -->

<div id="modalLogin" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <a class="close">&times;</a><br/>
            <h3>Log in</h3>
        </div>
        <div class="modal-body">
            <form id="login_form" class="form" method="post" action="register.php">
                <input type="text" name="loginMail" placeholder="AAU mail" id="loginMail" required><span class="error_form" id="loginMail_error_message"></span>
                <input type="password" name="loginPassword" placeholder="Password" id="loginPassword" required><span class="error_form" id="loginPassword_error_message"></span>
                <button class="form-button" type="submit" name="login_Btn" id="login_Btn">Login</button>
            </form>

        </div>
        <div class="modal-footer">
            <!-- First modal not closing before opening the next
                    <a class="modal-button" data-dismiss="modal" data-modal="modalSignUp">Sign Up here!</a>
                    -->
        </div>
    </div>
</div>

<!-- Registration modal: -->

<div id="modalSignUp" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <a class="close">&times;</a><br/>
            <h3>Sign Up</h3>
        </div>


        <div class="modal-body">
            <form id="registration_form" class="form" method="post" enctype="multipart/form-data" action="">
                <fieldset id="signUp">
                    <input type="text" name="firstName" placeholder="First Name" id="firstName"><span class="error_form" id="firstName_error_message"></span>
                    <input type="text" name="surName" placeholder="Last Name" id="surName"><span class="error_form" id="surName_error_message"></span>
                    <input type="text" name="aauMail" placeholder=" Enter your AAU Email" id="aauMail"><span class="error_form" id="aauMail_error_message"></span>
                    <select id="currentProgram" name="currentProgram" required><span class="error_form" id="currentProgram_error_message"></span>
                                <option value="" disabled selected>Select program...</option>
                                <option value="Art, Music & Design">Art, Music & Design</option>
                                <option value="Biology, Chemistry & Nature">Biology, Chemistry & Nature</option>
                                <option value="Business Economics, Trade & Management">Business Economics, Trade & Management</option>
                                <option value="IT, Electronics & Programming">IT, Electronics & Programming</option>
                                <option value="Language, Culture & History">Language, Culture & History</option>
                                <option value="Media, Communication & Information">Media, Communication & Information</option>
                                <option value="Medicine, Health & Care">Medicine, Health & Care</option>
                                <option value="Pedagogy, Psychology & Teaching">Pedagogy, Psychology & Teaching</option>
                                <option value="Physics, Mathematics & Nanotechnology">Physics, Mathematics & Nanotechnology</option>
                                <option value="Society, Politics & Economics">Society, Politics & Economics</option>
                                <option value="Technique, Construction & Innovation">Technique, Construction & Innovation</option>
                            </select>
                    <select id="currentSemester" name="currentSemester"><span class="error_form" id="currentSemester_error_message"></span>
                                <option value="" disabled selected>Select current semester...</option>
                                <option value="1st">1st semester</option>
                                <option value="2nd">2nd semester</option>
                                <option value="3rd">3rd semester</option>
                                <option value="4th">4th semester</option>
                                <option value="5th">5th semester</option>
                                <option value="6th">6th semester</option>
                                <option value="7th">7th semester</option>
                                <option value="8th">8th semester</option>
                                <option value="9th">9th semester</option>
                                <option value="10th">10th semester</option>
                            </select>

                    <input type="password" name="userPassword" placeholder="Password" id="userPassword"><span class="error_form" id="password_error_message"></span>
                    <input type="password" placeholder="Repeat password" id="retypePassword"><span class="error_form" id="retype_password_error_message"></span>
                </fieldset>


                <div class="checkboxes clearfix">
                    <label for="chkbox"><span>Would you also like to tutor?</span><input type="checkbox" id="chkbox" name="chkbox" value="no" onclick="showHide()"/></label>
                </div>


                <fieldset id="hiddenField" style="display: none">
                    <textarea id="bio" name="bio" placeholder="Write a short bio to let people know how you can help!"></textarea>
                    <input type="text" placeholder="Write subject tags, like math ect.." id="tags" name="tags">
                    <input type="text" placeholder="Suggested hourly fee" id="fee" name="fee">
                    <input type="file" accept="image/*" name="imageUpload" id="imageUpload">
                </fieldset>
                <button class="form-button" type="submit" name="signUp_btn" id="signUp_btn">Register</button>
            </form>

            <!-- First modal not closing before opening the next
                        <p class="message">Already a member? <a class="modal-button" data-modal="modalLogin"> Login here</a></p>
                    -->

        </div>
    </div>
</div>



<!-- modal to view a tutor's profile - appears in search.php -->


<div id="modalTutor" class="modal">
    <div class="modal-content outline">
        <div class="modal-header">
            <a class="close">&times;</a><br/>
            <?php include 'tutor.php' ?>
            <h2>
                <?php echo $name ?>
            </h2>
        </div>
        <div class="modal-body session-modal">
            <div>
                <img class='image-cropper' src='<?php echo $printPicture ?>' />
            </div>
            <div>
                <p class="small-bold">Study program</p>
                <span><?php echo $program ?></span><br/>
                <span><?php echo $semester ?> semester</span>
            </div>
            <div>
                <p class="small-bold">Description</p>
                <span><?php echo $bio ?></span><br/>
            </div>
            <div>
                <p class="small-bold">Tags</p>
                <span><?php echo $tags ?></span><br/>
            </div>
            <div>
                <p class="small-bold">Suggested hourly fee: </p>
                <span><?php echo $fee ?> Dkr</span><br/>
            </div>
            <div>
                <p class="small-bold">Tutor's contact information: </p>
                <span><a href="mailto:<?php echo $mail ?>?subject=Contact via AAU Tutor&body=Hi <?php echo $nameForEmail ?>!%0D%0A %0D%0A %0D%0A <Write your message here>%0D%0A %0D%0A %0D%0A %0D%0A Best regards%0D%0A <?php echo $_SESSION["firstName"]; ?>"><?php echo $mail ?></a></span><br/>
            </div>
        </div>
    </div>
</div>



<!-- modal to create a session - appears in home.php -->


<div id="modalCreateSession" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <a class="close">&times;</a><br/>
            <h3>New session</h3>
            <?php echo $sessErr?>
        </div>
        <div class="modal-body">
            <form id="createSess_form" class="form" method="post" action="_home.php">
                <fieldset id="createSession">
                    <input type="text" name="sessName" placeholder="Session Title" id="sessName" required><span class="error_form" id="sessName_error_message"></span>
                    <div class="date-time-col">
                        <div class="col-9">
                            <span>Starting Time</span>
                            <input id="dateTime" type="datetime-local" name="sessStart" required/><span class="error_form" id="dateTime_error_message"></span>
                        </div>
                        <div class="col-3">
                            <span>Duration</span>
                            <span class="error_form" id="time_error_message"></span>
                            <select id="duration" name="duration">
                                <option value="" disabled selected>Select...</option>
                                <option value="PT30M">00:30</option>
                                <option value="PT1H">01:00</option>
                                <option value="PT1H30M">01:30</option>
                                <option value="PT2H">02:00</option>
                                <option value="PT2H30M">02:30</option>
                                <option value="PT3H">03:00</option>
                                <option value="PT3H30M">03:30</option>
                                <option value="PT4H">04:00</option>
                                <option value="PT4H30M">04:30</option>
                                <option value="PT5H">05:00</option>
                            </select>
                        </div>
                    </div>

                    <input type="text" name="sessDesc" placeholder="Session Description" id="sessDesc" required/><span class="error_form" id="desc_error_message"></span>

                    <input type="email" name="sessStudent" placeholder="Student's AAU Email" id="sessStudent" required/><span class="error_form" id="studMail_error_message"></span>

                    <input type="text" name="fee" placeholder="Agreed hourly fee" id="fee" required/><span class="error_form" id="fee_error_message"></span>

                </fieldset>

                <button class="form-button" type="submit" name="createSess_btn" id="createSess_btn">Create new session</button>

            </form>
        </div>
    </div>
</div>


<!-- modal to show session - appears in home.php -->


<div id="modalSession" class="modal">
    <div class="modal-content outline">
        <div class="modal-header">
            <a class="close">&times;</a><br/>
            <h2>
                <?php echo $title ?>
            </h2>
        </div>
        <div class="modal-body session-modal">
            <div>
                <p class="small-bold">Description:</p>
                <span><?php echo $desc ?></span><br/>
            </div>
            <div>
                <p class="small-bold">Date and Time:</p>
                <span><?php echo $start ?></span>
            </div>
            <div>
                <p class="small-bold">Duration:</p>
                <span><?php echo $duration ?></span>
            </div>
            <div>
                <p class="small-bold">Agreed hourly Fee:</p>
                <span><?php echo $fee ?> Dkr.</span>
            </div>
            <div>
                <p class="small-bold">Student:</p>
                <span><?php echo $student ?></span><br/>
                <span><?php echo $studentPrg ?></span><br/>
                <span><?php echo $studentMail ?></span>
            </div>
        </div>
        <hr>
        <form method="post" action="">

            <!-- Henriette please put this button in center <3 -->

            <button class="form-button" type="submit" name="deleteSession" id="deleteSession" style="display: none">Delete Session</button>
        </form>
    </div>
</div>



<!-- Edit user modal: -->


<div id="modalEditUser" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <a class="close">&times;</a><br/>
            <h3>Here you can update your profile</h3>
        </div>

        <div class="modal-body">
            <form id="editUser_form" class="form" method="post" action="">
                <fieldset id="edit">
                    <input type="text" name="firstName" value="<?php echo $_SESSION["firstName"];?>" id="firstName"><span class="error_form" id="firstName_error_message"></span>
                    <input type="text" name="surName" value="<?php echo $_SESSION["surName"];?>" id="surName"><span class="error_form" id="surName_error_message"></span>
                    <input type="text" name="loginMail" value="<?php echo $_SESSION["loginMail"];?>" id="loginMail" readonly><span class="error_form" id="loginMail_error_message"></span>
                    <select id="currentProgram" name="currentProgram"><span class="error_form" id="currentProgram_error_message"></span>
                                 <option value="<?php echo $_SESSION["currentProgram"];?>" selected><?php echo $_SESSION["currentProgram"];?></option>
                                <option value="Art, Music & Design">Art, Music & Design</option>
                                <option value="Biology, Chemistry & Nature">Biology, Chemistry & Nature</option>
                                <option value="Business Economics, Trade & Management">Business Economics, Trade & Management</option>
                                <option value="IT, Electronics & Programming">IT, Electronics & Programming</option>
                                <option value="Language, Culture & History">Language, Culture & History</option>
                                <option value="Media, Communication & Information">Media, Communication & Information</option>
                                <option value="Medicine, Health & Care">Medicine, Health & Care</option>
                                <option value="Pedagogy, Psychology & Teaching">Pedagogy, Psychology & Teaching</option>
                                <option value="Physics, Mathematics & Nanotechnology">Physics, Mathematics & Nanotechnology</option>
                                <option value="Society, Politics & Economics">Society, Politics & Economics</option>
                                <option value="Technique, Construction & Innovation">Technique, Construction & Innovation</option>
                            </select>

                    <select id="currentSemester" name="currentSemester"><span class="error_form" id="currentSemester_error_message"></span>
                                <option value="<?php echo $_SESSION["currentSemester"];?>" selected><?php echo $_SESSION["currentSemester"];?></option>
                                <option value="1st">1st semester</option>
                                <option value="2nd">2nd semester</option>
                                <option value="3rd">3rd semester</option>
                                <option value="4th">4th semester</option>
                                <option value="5th">5th semester</option>
                                <option value="6th">6th semester</option>
                                <option value="7th">7th semester</option>
                                <option value="8th">8th semester</option>
                                <option value="9th">9th semester</option>
                                <option value="10th">10th semester</option>
                            </select>

                    <?php 
                    if($_SESSION["isTutor"] == 1) {
                        echo '<textarea id="bio" name="bio">'.$_SESSION["bio"].'</textarea>
                    <input type="text" value="'.$_SESSION["tags"].'" id="tags" name="tags">
                    <input type="text" value="'.$_SESSION["suggestedFee"].'" id="fee" name="fee">';
                    }
                ?>

                    <input type="password" name="userPassword" placeholder="New password" id="userPassword"><span class="error_form" id="password_error_message"></span>
                    <input type="password" name="retypePassword" placeholder="Repeat password" id="retypePassword"><span class="error_form" id="retype_password_error_message"></span>

                </fieldset>
                <button class="form-button-update" type="submit" name="update_profile" id="update_profile">Update</button>
            </form>
            <!-- First modal not closing before opening the next
                    <p class="message">Already a member? <a class="modal-button" data-modal="modalLogin"> Login here</a></p>
            -->

        </div>
    </div>
</div>
