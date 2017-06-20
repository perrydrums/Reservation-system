<form id="privateForm" action="php/processForms.php" method="POST" class="privateFormAjax">
    <table width="100%">
        <tr>
            <td><input required type="text" name="firstName" placeholder="Voornaam" class="formFields"></td>
            <td><input required type="text" name="lastName" placeholder="Achternaam" class="formFields"></td>
        </tr>
        <tr>
            <td colspan="2"><input required type="email" name="email" placeholder="Emailadres" class="formFields"></td>
        </tr>
        <tr>
            <td colspan="2"><input required type="tel" name="tel" placeholder="Telefoonnummer" class="formFields"></td>
        </tr>
        <tr>
            <td>
                <select required name="age" class="formFields">
                    <option selected disabled>Leeftijd</option>
                    <?php
                        for($i = 5; $i < 100; $i++){
                            echo('<option value="'.$i.'">'.$i.'</option>');
                        }
                    ?>
                </select>
            </td>
            <td>
                <select required name="gender" class="formFields" id="gender">
                    <option selected disabled>Geslacht</option>
                    <option value="Man">Man</option>
                    <option value="Vrouw">Vrouw</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <select required name="date" id="selectDatum" class="formFields">
                    <option selected disabled>Selecteer datum</option>
                    <?php

                    $query2 = mysqli_query($connect,"SELECT DISTINCT date FROM available ORDER BY date ASC") or die(mysqli_error($connect));

                    while($availableGet = mysqli_fetch_assoc($query2)){
                        setlocale(LC_ALL, 'nl_NL');
                        $availableDate = $availableGet['date'];
                        if(strtotime($availableDate) >= time() - 86400){
                            $readableDate = strftime('%A %e %B',strtotime($availableDate));
                            echo ("<option value='$availableDate'>".$readableDate."</option>");
                        }
                    } ?>
                </select>
            </td>
            <td>
                <!--    Select tag built by getafspraken.js   -->
                <select required name="time" id="selectTijd" class="formFields"></select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" id="submitButton" name="submitPrivateForm" value="Plan proefles!" class="submitButton">
            </td>
        </tr>
    </table>
    <script src="js/getafspraken.js"></script>
</form>