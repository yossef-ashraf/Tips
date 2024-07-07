Complete steps of Nginx, Node.js, Composer and Yarn with npm:
### Installing Nginx on Ubuntu 22.04

1. **Update package index:**
 ``` bash
 Sudo appropriate update
 ```

2. **Installing Nginx:**
 ``` bash
 Sudo is suitable for installing nginx
 ```

3. **Run Inginx:**
 ``` bash
 sudo systemctl start nginx
 ```

4. **Enable Nginx to run fresh on startup:**
 ``` bash
 sudo systemctl enable nginx
 ```

5. **Adjust wall protection (if required):**
 ``` bash
 sudo ufw allows "Nginx HTTP"
 sudo ufw allows "Nginx HTTPS"
 Reload sudo ufw
 ```

6. **Verify Nginx installation:**
 Log into your web browser and enter your server's IP address. You should restore the default Nginx welcome page.

7. ** Read Read Information: **
 For detailed final details and additional options, [DigitalOceanfor Nginx on Ubuntu 22.04 Guide](https://www.digitalocean.com/community/tutorials/how-to-install-nginx-on-ubuntu-22-04).

---

### Install Node.js

1. **Add a NodeSource repository:**
 ``` bash
 curl -s https://deb.nodesource.com/setup_18.x | sudo bash -
 ```

2. **Installing Node.js:**
 ``` bash
 Sudo is suitable for installing Nodejs
 ```

3. **Verify installation:**
 ``` bash
 node -v
 npm -v
 ```

---

### Install composer

1. **Update package index:**
 ``` bash
 Sudo appropriate update
 ```

2. **Install necessary tools:**
 ``` bash
 sudo apt install php-cli unzip
 ```

3. **Download and install Composer:**
 ``` bash
 cd ~
 curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
 HASH=curl -sS https://composer.github.io/installer.sig
 php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo "The installer has been verified"; } else { echo "The installer is corrupt"; unlink (' /tmp/composer-setup.php'); } echo PHP_EOL;"
 sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
 ```

4. **Verify installation:**
 ``` bash
 Composer--version
 ```

---

### Install yarn with npm

1. **Install Yarn (assume npm is already installed):**
 ``` bash
 npm install -global yarn
 ```

2. **Verify installation:**
 ``` bash
 Spinning - version
 ```

---

### Install additional PHP extension (php-dom)

1. **Install php-dom extension:**
 ``` bash
 sudo apt-get install php-dom
 ```

2. **Verify installation (if necessary):**
 ``` bash
 php-m | grep dom
 ```
