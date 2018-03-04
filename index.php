<?php
require_once 'Settings.php';
require_once 'StarterInput.php';
require_once 'StarterOutput.php';
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
        $this->input = new StarterInput($this->getSettings(TPL_INPUT_NAME));
//        $this->algo = new StarterInput($this->getSettings(TPL_ALGO_NAME));
        $this->output = new StarterOutput($this->getSettings(TPL_OUTPUT_NAME));
//        eee($sett, __FILE__, __LINE__);
        
    }
}


//error_reporting(E_ALL & ~E_NOTICE);
try
{
    $obj = new FormatePlainText(10);
    $val = 400;
    echo sprintf('%1$s %2$d <br>', TPL_ALGO_NAME, $val);
    
    
    //echo $obj;
} catch (Exception $ex) {

eee($ex->getMessage(), $ex->getFile(), $ex->getLine());
Die();
}
?>


<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <form method="POST" action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF') ?>"> 
            
            <select name="<?php echo TPL_INPUT_NAME ?>">
                <option <?php $value = "choose randomly"; echo 'value="' . $value . '"'; 
                echo (StarterInput::getSett() == $value ? " selected" : "") . ">" . $value; ?></option>
                <option <?php $value = "select manualy"; echo 'value="' . $value . '"'; 
                echo (StarterInput::getSett() == $value ? " selected" : "") . ">" . $value; ?></option>
            </select>
            <select name="<?php echo TPL_ALGO_NAME ?>">
                <option value="algo 1">algo 1</option>
                <option value="algo 2">algo 2</option>
                <option value="algo 3">algo 3</option>
            </select>
            <select name="<?php echo TPL_OUTPUT_NAME ?>">
                <option <?php $value = "html"; echo 'value="' . $value . '"'; 
                echo (StarterOutput::getSett() == $value ? " selected" : "") . ">" . $value; ?></option>
                <option <?php $value = "text file"; echo 'value="' . $value . '"'; 
                echo (StarterOutput::getSett() == $value ? " selected" : "") . ">" . $value; ?></option>
            </select>
            <button type="submit">>> GO >></button>
        </form>
        <?php //eee($obj, __FILE__, __LINE__) ?>
    </body>
</html>