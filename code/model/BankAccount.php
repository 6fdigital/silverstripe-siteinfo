<?php
/**
 * Created by PhpStorm.
 * User: marcokernler
 * Date: 30.01.18
 * Time: 12:35
 */

class BankAccount extends DataObject {

    /**
     * @var array
     */
    private static $db = array(
        "BankName" => "Varchar(100)",
        "IBAN" => "Varchar(50)",
        "BIC" => "Varchar()"
    );


    /**
     * @var array
     */
    private static $has_one = array(
        "SiteConfig" => "SiteConfig"
    );


    // - - -


    /**
     * @return ValidationResult
     */
    public function validate() {
        $result = parent::validate();

        // validate the iban
        if (!verify_iban($this->IBAN)) {
            //
            $message = _t("BankAccount.IBAN_CHECK_YOUR_INPUT","Please check your input. The IBAN doesn't meant to be correct.");

            // try getting some suggestions
            $suggestions = iban_mistranscription_suggestions($this->IBAN);
            if(count($suggestions) == 1) {
                //
                $message .= " " . _t("BankAccount.IBAN_DID_YOU_MEAN", "Did you mean {suggestion} ?", "", array("suggestion" => $suggestions[0]));
            }

            $result->error($message);
        }

        return $result;
    }


    /**
     * @return null|string|string[]
     */
    public function ToMachineFormat() {
        return iban_to_machine_format($this->IBAN);
    }


    /**
     * @return null|string|string[]
     */
    public function ToHumanFormat() {
        return iban_to_human_format($this->IBAN);
    }
}
