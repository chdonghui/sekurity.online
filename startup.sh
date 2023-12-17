docker run -it \
--rm \
--name sekurity \
-p 10000:80 \
-v $(pwd)/src/:/var/www/html/ \
httpd:latest bash
