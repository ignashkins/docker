FROM nginx

RUN useradd bitrix --create-home --password bitrix --user-group && \
    chgrp -R bitrix /var/cache/nginx /var/run /var/log/nginx && \
    chmod -R 770 /var/cache/nginx /var/run /var/log/nginx

CMD ["nginx", "-g", "daemon off;"]