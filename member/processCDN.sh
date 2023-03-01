while true;
do
echo `date +"%Y-%m-%d %T"` "Start check for files";
if [ -n "$(find /var/www/alphaRocFrontend/member/tempMedia/* -type f -mmin +0.2 2>/dev/null)" ]
        then
                for f in $(find /var/www/alphaRocFrontend/member/tempMedia/* -type f -mmin +0.2)
                do
                        echo 'copying '$f;
                        scp $f root@tu:/var/www/cdn_prod/2sPsQ7e4623S9KfR/ && mv $f /var/www/alphaRocFrontend/member/trash/
                        echo 'done';
                done
fi
sleep 5;
done