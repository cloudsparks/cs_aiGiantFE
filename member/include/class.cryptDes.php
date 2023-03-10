<?php
/**
*
* PHP版DES加解密类
*
* 可与java、c#的3DES(DESede)加密方式兼容
*
* @Author: Luo Hui (farmer.luo at gmail.com) update by melec 2010-10-25
*
* @version: V0.1 2008.12.04
* @version: V0.2 2010.05.28
* @version: V0.3 2010.10.25 增加华为特殊处理支持
*
*/
class cryptdes {
    var $key    =   'i generate a random string';
    function cryptdes($key='') {
        if($key) $this->key = $key;
    }
    function setKey($key){
        $this->key = $key;
    }
    function encrypt($input,$type='default') {
        $size = mcrypt_get_block_size('des', 'ecb');
        $input = $this->pkcs5_pad($input, $size);
        $key = $this->key;
        $td = mcrypt_module_open('des', '', 'ecb', '');
        $iv = @mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        @mcrypt_generic_init($td, $key, $iv);
        $data = mcrypt_generic($td, $input);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        //标准处理方法
        //$data = base64_encode($data);
        //java处理格式.2进制加密串转16进制.每两个字符分割的大写字符串.
        $data   =   $this->outputFilter($data,$type);
        return $data;
    }
    function decrypt($encrypted,$type='default') {
        //标准处理方法
        //$encrypted = base64_decode($encrypted);
        //java处理格式
        $encrypted = $this->inputFilter($encrypted,$type);
        $key =$this->key;
        $td = mcrypt_module_open('des','','ecb','');
        //使用MCRYPT_DES算法,cbc模式
        $iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        $ks = mcrypt_enc_get_key_size($td);
        @mcrypt_generic_init($td, $key, $iv);
        //初始处理
        $decrypted = mdecrypt_generic($td, $encrypted);
        //解密
        mcrypt_generic_deinit($td);
        //结束
        mcrypt_module_close($td);
        $y=$this->pkcs5_unpad($decrypted);
        return $y;
    }
    function pkcs5_pad ($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }
    function pkcs5_unpad($text) {
        $pad = ord($text{strlen($text)-1});
        if ($pad > strlen($text))
            return false;
        if (strspn($text, chr($pad), strlen($text) - $pad) != $pad)
            return false;
        return substr($text, 0, -1 * $pad);
    }
    function inputFilter($data,$type='hex'){
        if($type=='java'){
            //去掉分割符 -
            //如：AB-34-12-3D => AB34123D
            $data   =   str_replace('-','',$data);
            //16进制转成2进制字符串
            $data   =   pack('H*',$data);
        }else if ($type == 'base64_decode'){
            $data   =   base64_decode($data);
        }else{
            $data   =   $this->hex2bin($data);
        }
        return $data;
    }
    function outputFilter($data,$type='hex'){
        if($type=='java'){
            //每两个字符增加一个分割符 - ，并转换成大写
            //如：ab34123d => AB-34-12-3D
            $data = strtoupper(rtrim(chunk_split(bin2hex($data),2,'-'),'-'));
        }else if ($type == 'base64_encode'){
            $data   =   base64_encode($data);
        }else{
            $data   =   bin2hex($data);
        }
        return $data;
    }

    function hex2bin($hexstr) 
    { 
        $n = strlen($hexstr); 
        $sbin="";   
        $i=0; 
        while($i<$n) 
        {       
            $a =substr($hexstr,$i,2);           
            $c = pack("H*",$a); 
            if ($i==0){$sbin=$c;} 
            else {$sbin.=$c;} 
            $i+=2; 
        } 
        return $sbin; 
    } 

}

//测试代码
// $key = "i generate a random string";
// $input = "test1308";
// $crypt = new cryptdes();
// $encrypt = $crypt->encrypt($input);
// $decrypt = $crypt->decrypt($encrypt);

// echo "encrypt: $encrypt\n";
// echo "decrypt: $decrypt\n";

// $crypt = new CryptDES($key);
// $encrypt =   $crypt->encrypt($input,'hex');
// echo "Encode:".$encrypt."\n";
// echo "Decode:".$crypt->decrypt($encrypt, 'hex')."\n";
?>