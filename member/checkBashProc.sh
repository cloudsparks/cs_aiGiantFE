ps_out=`ps -ef | grep $1 | grep -v 'grep' | grep -v $0`
result=$(echo $ps_out | grep "$1")
if [[ "$result" != "" ]];then
    echo `date +"%Y-%m-%d %T"` "$1" " is Running";
    exit 1;
else
        sh /var/www/alphaRocFrontend/member/"$1" >> /var/www/alphaRocFrontend/member/log/"$1".txt 2>&1
fi