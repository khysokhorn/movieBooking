echo "Enter Number to rool back : " 
read $num
php artisan migrate:rollback --step=$num
echo "Number  level rool back" . $num
#  cinema_halls_id integer:unsigned:foreign,cinema_halls,id selectTable:cinema_halls:name,id