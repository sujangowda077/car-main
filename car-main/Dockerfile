FROM nginx:alpine

# Clean default nginx page
RUN rm -rf /usr/share/nginx/html/*

# Copy website files into nginx folder
COPY . /usr/share/nginx/html

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
