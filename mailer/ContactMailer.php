<?php
class ContactMailer
{
    /**
     * E-mail отправителя
     * @var string
     */
    private static $emailFrom = 'otpravshchik.form@inbox.ru';
    /**
     * E-mail получателя
     * @var string
     */
    // private static $emailTo = 'mail@metrels.ru';
    private static $emailTo = 'sale@metrels.ru';

    /**
     * Отправляет писмо, если письмо отправлено,
     * возвращает TRUE, в противном случае FALSE.
     * @param string $name
     * @param string $phone
     * @param string $message
     * @return boolean
     */
    public static function send($page, $name, $phone, $message)
    {
        // Формируем тело письма
        $body = '<html><head><title>Заявка от пользователя</title></head><body>';
        $body .= '<table style="border-radius: 5px;font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif; font-size: 14px;border-collapse: collapse;text-align: center;">';
        $body .= '<tr>';
        $body .= '<th style="font-size: 16px;background: #1A1A1A;color: white;padding: 10px 20px;border-style: solid;border-width: 0 1px 1px 0;border-color: white;text-align: left;">';
        $body .= 'Страница';
        $body .= '</th>';
        $body .= '<td style="padding-left: 6px;font-size: 14px;border-style: solid;border-width: 0 1px 1px 0;border-color: white;background: #AFAFAF; width: 100%;max-width: 600px;">';
        $body .= $page;
        $body .= '</td>';
        $body .= '</tr>';
        $body .= '<tr>';
        $body .= '<th style="font-size: 16px;background: #1A1A1A;color: white;padding: 10px 20px;border-style: solid;border-width: 0 1px 1px 0;border-color: white;text-align: left;">';
        $body .= 'Имя';
        $body .= '</th>';
        $body .= '<td style="padding-left: 6px;font-size: 14px;border-style: solid;border-width: 0 1px 1px 0;border-color: white;background: #AFAFAF; width: 100%;max-width: 600px;">';
        $body .= $name;
        $body .= '</td>';
        $body .= '</tr>';
        $body .= '<tr>';
        $body .= '<th style="font-size: 16px;background: #1A1A1A;color: white;padding: 10px 20px;border-style: solid;border-width: 0 1px 1px 0;border-color: white;text-align: left;">';
        $body .= 'Телефон';
        $body .= '</th>';
        $body .= '<td style="padding-left: 6px;font-size: 14px;border-style: solid;border-width: 0 1px 1px 0;border-color: white;background: #AFAFAF; width: 100%;max-width: 600px;">';
        $body .= $phone;
        $body .= '</td>';
        $body .= '</tr>';
        $body .= '<tr>';
        $body .= '<th style="font-size: 16px;background: #1A1A1A;color: white;padding: 10px 20px;border-style: solid;border-width: 0 1px 1px 0;border-color: white;text-align: left;">';
        $body .= 'Сообщение';
        $body .= '</th>';
        $body .= '<td style="padding-left: 6px;font-size: 14px;border-style: solid;border-width: 0 1px 1px 0;border-color: white;background: #AFAFAF; width: 100%;max-width: 600px;">';
        $body .= $message;
        $body .= '</td>';
        $body .= '</tr>';
        $body .= '</table>';
        $body .= '</body></html>';

        $to      = self::$emailTo;
        $subject = 'Заполнена форма обратной связи';

        $headers  = "From: " . self::$emailFrom . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $admin_mail_result = mail($to, $subject, $body, $headers);

        // Отправляет письмо
        if ($admin_mail_result) {
            return true;
        }
        return false;
    }
}
