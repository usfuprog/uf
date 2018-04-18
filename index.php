<?php
require_once 'Settings.php';
require_once 'StarterInput.php';
require_once 'StarterOutput.php';
require_once 'StarterAlgo.php';
/**
 * Description of FormatPlainText
 * This class get settings from class which he is extends of, and create input, output and algorythm objects, with this 
 * settings. Also it provide few methods, that will calculate and return the results.
 * 
 * @author usfuprog
*/
class FormatePlainText extends Settings
{
    private $inpt, $algo, $output;
    
    public function __construct($num)
    {
        $sett = sprintf($this);
        if (!$sett)
            throw new Exception("Settings FAIL !!!");
//        eee($sett, __FILE__, __LINE__);
        eee($this->getSettings("txtFile"), __FILE__, __LINE__);
        
        $this->input = new StarterInput($this->getSettings(TPL_INPUT_NAME), $this);
        $this->algo = new StarterAlgo($this->getSettings(TPL_ALGO_NAME), $this);
        $this->output = new StarterOutput($this->getSettings(TPL_OUTPUT_NAME), $this);
//        Starter::setFptObj($this);
        eee($this->output->getSett(), __FILE__, __LINE__);
        eee($this->getSettings('wordsCnt'), __FILE__, __LINE__);
//        eee(StarterOutput::getSett());
        eee($this->getSettings('badTranslation'), __FILE__, __LINE__);
//        eee($sett, __FILE__, __LINE__);
        
    }
    
    /*
     * Return values of different parts of form, to write it on page again after form was send.
     */
    public function getFormSett($name)
    {
        return $this->getSettings($name);
    }
}


//error_reporting(E_ALL & ~E_NOTICE);
try
{
    $obj = new FormatePlainText(10);
    $val = 400;
//    echo sprintf('%1$s %2$d <br>', TPL_ALGO_NAME, $val);
    
    //echo $obj;
} catch (\Exception $ex) {

eee($ex->getMessage(), $ex->getFile(), $ex->getLine());
Die();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="jq/jquery-3.3.1.js"></script>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="jq/jquery-ui.js"></script>
        <link href="jq/jquery-ui.css" rel="stylesheet"> -->
        <script src="jsHere.js"></script>
        <script>
            try
            {
                $(function()
                {
                    starter("<?php echo TPL_INPUT_NAME ?>", "<?php echo TPL_OUTPUT_NAME ?>", "<?php echo TPL_ALGO_NAME ?>");
                }
                );
            }
            catch (err)
            {
                alert("jQuery NOT FOUND. Library jQuery is REQUIRED for correct work of this site.");
            }
        </script>
    </head>
    <body style="margin-bottom: 256px">
        <div style="height: 100px;" name="wordsListWrapper">
            <select name="wordsList" multiple="multiple" style="height: 100%">
                
            </select>
        </div>
        <form method="POST" action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF') ?>"> 
            <select name="<?php echo TPL_INPUT_NAME ?>">
                <option <?php $value = "choose randomly"; echo 'value="' . $value . '"'; 
                echo (StarterInput::getSett() == $value ? " selected" : "") . ">" . $value; ?></option>
                <option <?php $value = "select manualy"; echo 'value="' . $value . '"'; 
                echo (StarterInput::getSett() == $value ? " selected" : "") . ">" . $value; ?></option>
            </select>
            <select name="<?php echo TPL_ALGO_NAME ?>">
                <option <?php $value = "algo 1"; echo 'value="' . $value . '"'; 
                echo (StarterAlgo::getSett() == $value ? " selected" : "") . ">" . $value; ?></option>
                <option <?php $value = "algo 2"; echo 'value="' . $value . '"'; 
                echo (StarterAlgo::getSett() == $value ? " selected" : "") . ">" . $value; ?></option>
                <option <?php $value = "algo 3"; echo 'value="' . $value . '"'; 
                echo (StarterAlgo::getSett() == $value ? " selected" : "") . ">" . $value; ?></option>
            </select>
            <select name="<?php echo TPL_OUTPUT_NAME ?>">
                <option <?php $value = "html"; echo 'value="' . $value . '"'; 
                echo (StarterOutput::getSett() == $value ? " selected" : "") . ">" . $value; ?></option>
                <option <?php $value = "text file"; echo 'value="' . $value . '"'; 
                echo (StarterOutput::getSett() == $value ? " selected" : "") . ">" . $value; ?></option>
            </select>
            
            
            <button type="submit"><?php echo htmlspecialchars(">> GO >>"); ?></button>
            <span style="margin-left: 100px" name="badTranslation">
                <label for="badTranslation">Incorrect words will be from: </label>
                <input type="radio" name="badTranslation" <?php 
                        echo $obj->getFormSett("badTranslation") == "db" || $obj->getFormSett("badTranslation") == ""
                                ? "checked='checked'" : ""; ?>
                        value="db">db</input>
                <input type="radio" name="badTranslation" <?php 
                        echo $obj->getFormSett("badTranslation") == "already exist" ? "checked='checked'" : ""; ?>
                       value="already exist">already selected words</input>
            </span>
            <div name="countWords">
                <div>&nbsp;</div>
                <label for="countOfWords">Count of words:</label>
                <input type="number" value="10" min="1" max="100" name="wordsCnt" />
            </div>
            <div style="margin: 0 auto; width: 50%;" name="moreServicesProvide">
                <div name="nameFile">
                    <label for="nameFile">Text file name:</label>
                    <input type="text" name="txtFile" value=
                        <?php echo $obj->getFormSett("txtFile"); ?> 
                           >
                </div>
                <div>&nbsp;</div>
                <div name="choosedWords">
                    <div>Already choosed:</div>
                </div>
            </div>
        </form>
        <?php //eee($obj, __FILE__, __LINE__) ?>
    </body>
</html>