FROM ubuntu:15.04
RUN apt-get update && apt-get install -y \
        apache2 \
        apache2-utils \
        php5 \
        php5-mysql \
        curl \
        && apt-get clean
RUN echo "$(curl -s -L https://gist.githubusercontent.com/Shogan/97099e88da3c42f7c16ee8d3c9f19cdb/raw/fc9c3223f81695db3dee59469389ca58f2a1fea1/simplewebapp.php)" > /var/www/html/index.php && rm /var/www/html/index.html
EXPOSE 80
CMD ["apache2ctl", "-D", "FOREGROUND"]
