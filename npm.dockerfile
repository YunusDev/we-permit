FROM node:alpine

WORKDIR /var/www/html

COPY ./src/package*.json ./

RUN npm install

COPY ./src .

CMD ["npm", "run", "watch"]