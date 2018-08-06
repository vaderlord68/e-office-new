<?php
namespace App;

class CoreHelpers extends \Illuminate\Database\Eloquent\Model
{
    protected static $gsTypeEncrypt = "DED0104";
    protected static $gsXCodeString = "CCuL40";

    //Mã hóa cho passuser cura Lemon3
    //Chú ý: những ký tự bảng mã từ 128 đến 255 PHP không hiểu nên viết thêm hàm unichr()

    public static function encrypt_userpass($str)
    {
        if ($str == '') return '';

        $len = strlen($str);
        //đưa chuỗi vào mảng arr
        $arr = str_split($str, 1);
        $arr1 = $arr;    //print_r($arr);

        // Mã hóa chuỗi gắn lại giá trị vào mảng
        for ($i = 0; $i < $len; $i++) {
            $iord = (ord($arr1[$i]) * 2) + 3;
            if ($iord > 127) // nếu dùng mã mở rộng thì dùng hàm unichr (tự viết)
                $arr[$len - ($i + 1)] = CoreHelpers::unichr($iord, '');
            else
                $arr[$len - ($i + 1)] = chr($iord);
        }

        //lấy mảng đưa vào chuỗi lại.
        $outstr = "";
        for ($i = 0; $i < $len; $i++) {
            $outstr .= $arr[$i];
        }


        return $outstr;
    }

    public static function decrypt_userpass($str)
    {
        if ($str == '') return '';

        //đưa chuỗi vào mảng arr
        $arr = CoreHelpers::mbStringToArray($str);//mb_substr($str,0,1,"UTF-8");
        $arr1 = $arr;    //print_r($arr);
        $len = count($arr);
        // Mã hóa chuỗi gắn lại giá trị vào mảng
        $offset = 0;
        $i = 0;

        for ($i = 0; $i < $len; $i++) {
            if ($arr1[$i] != '') {
                $key = CoreHelpers::unichr(0, $arr1[$i]);
                if ($key === false) {
                    $iord = (CoreHelpers::ordutf8($arr1[$i], $i) - 3) * 0.5;
                    if ($iord > 127) // n?u dùng mã m? r?ng thì dùng hàm unichr (t? vi?t)
                    {
                        $arr[$len - ($i + 1)] = CoreHelpers::unichr($iord, '');
                    } else {
                        $arr[$len - ($i + 1)] = chr($iord);
                    }
                } else {
                    $arr[$len - ($i + 1)] = chr(($key - 3) / 2);
                }

            }
        }
        //lấy mảng đưa vào chuỗi lại.
        $outstr = "";
        for ($i = 0; $i < $len; $i++) {
            $outstr = $outstr . $arr[$i];
        }
        return $outstr;
    }


    protected static function ordutf8($string, &$offset)
    {
        //$code = ord(substr($string, $offset,1));
        $code = ord($string);
        if ($code >= 128) {        //otherwise 0xxxxxxx
            if ($code < 224) $bytesnumber = 2;                //110xxxxx
            else if ($code < 240) $bytesnumber = 3;        //1110xxxx
            else if ($code < 248) $bytesnumber = 4;    //11110xxx
            $codetemp = $code - 192 - ($bytesnumber > 2 ? 32 : 0) - ($bytesnumber > 3 ? 16 : 0);
            for ($i = 2; $i <= $bytesnumber; $i++) {
                //$offset ++;
                $code2 = ord($string) - 128;// ord(substr($string, $offset, 1)) - 128;        //10xxxxxx
                $codetemp = $codetemp * 64 + $code2;
            }
            $code = $codetemp;
        }
        return $code;
    }

    //đưa các kí tự trong chuỗi vào mảng
    protected static function mbStringToArray($string)
    {
        $strlen = mb_strlen($string);
        while ($strlen) {
            $array[] = mb_substr($string, 0, 1, "UTF-8");
            $string = mb_substr($string, 1, $strlen, "UTF-8");
            $strlen = mb_strlen($string);
        }
        return $array;
    }

    static function unichr($n, $value)
    {
        $ascii_array = array(
            128 => "€",
            129 => "",
            130 => "‚",
            131 => "ƒ",
            132 => "„",
            133 => "…",
            134 => "†",
            135 => "‡",
            136 => "ˆ",
            137 => "‰",
            138 => "Š",
            139 => "‹",
            140 => "Œ",
            141 => "",
            142 => "Ž",
            143 => "",
            144 => "",
            145 => "‘",
            146 => "’",
            147 => "“",
            148 => "”",
            149 => "•",
            150 => "–",
            151 => "—",
            152 => "˜",
            153 => "™",
            154 => "š",
            155 => "›",
            156 => "œ",
            157 => "",
            158 => "ž",
            159 => "Ÿ",
            160 => " ",
            161 => "¡",
            162 => "¢",
            163 => "£",
            164 => "¤",
            165 => "¥",
            166 => "¦",
            167 => "§",
            168 => "¨",
            169 => "©",
            170 => "ª",
            171 => "«",
            172 => "¬",
            173 => "­",
            174 => "®",
            175 => "¯",
            176 => "°",
            177 => "±",
            178 => "²",
            179 => "³",
            180 => "´",
            181 => "µ",
            182 => "¶",
            183 => "·",
            184 => "¸",
            185 => "¹",
            186 => "º",
            187 => "»",
            188 => "¼",
            189 => "½",
            190 => "¾",
            191 => "¿",
            192 => "À",
            193 => "Á",
            194 => "Â",
            195 => "Ã",
            196 => "Ä",
            197 => "Å",
            198 => "Æ",
            199 => "Ç",
            200 => "È",
            201 => "É",
            202 => "Ê",
            203 => "Ë",
            204 => "Ì",
            205 => "Í",
            206 => "Î",
            207 => "Ï",
            208 => "Ð",
            209 => "Ñ",
            210 => "Ò",
            211 => "Ó",
            212 => "Ô",
            213 => "Õ",
            214 => "Ö",
            215 => "×",
            216 => "Ø",
            217 => "Ù",
            218 => "Ú",
            219 => "Û",
            220 => "Ü",
            221 => "Ý",
            222 => "Þ",
            223 => "ß",
            224 => "à",
            225 => "á",
            226 => "â",
            227 => "ã",
            228 => "ä",
            229 => "å",
            230 => "æ",
            231 => "ç",
            232 => "è",
            233 => "é",
            234 => "ê",
            235 => "ë",
            236 => "ì",
            237 => "í",
            238 => "î",
            239 => "ï",
            240 => "ð",
            241 => "ñ",
            242 => "ò",
            243 => "ó",
            244 => "ô",
            245 => "õ",
            246 => "ö",
            247 => "÷",
            248 => "ø",
            249 => "ù",
            250 => "ú",
            251 => "û",
            252 => "ü",
            253 => "ý",
            254 => "þ",
            255 => "ÿ"
        );
        if ($value != '')
            return array_search($value, $ascii_array);
        else
            return $ascii_array[$n];
    }
}