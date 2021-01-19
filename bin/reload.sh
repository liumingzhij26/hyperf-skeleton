#!/usr/bin/env sh

basepath=$(cd `dirname $0`; pwd)
cd $basepath
cd ../
echo $(pwd)

if [ ! -f "composer.lock" ]; then
  echo "Not found composer.lock, please composer install first."
  exit
fi
echo "[start] git pull"
git pull
echo "[start] init cache"

composer dump-autoload -o

php ./bin/hyperf.php > /dev/null 2>&1

if ! composer test; then
    echo "unit test fail..."
    echo "unit test fail..."
    echo "unit test fail..."
    exit
fi

echo "[start] service stop"

if ! systemctl restart xxx.service; then
    echo "[error] reload service fail"
    echo "[error] reload service fail"
    echo "[error] reload service fail"
    exit
fi

echo "[start] service start"

echo "[start] Runtime cleared"

echo "[start] Finish!"


sleep 1

systemctl status xxx.service