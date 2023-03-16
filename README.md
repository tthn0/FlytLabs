<div align="center">
  <picture>
    <source
      width="100%"
      media="(prefers-color-scheme: light), (prefers-color-scheme: no-preference)"
      srcset="Images/Banner/Light.svg"
    />
    <source
      width="100%"
      media="(prefers-color-scheme: dark)"
      srcset="Images/Banner/Dark.svg"
    />
    <img alt="Banner">
  </picture>
  <h1>
      FlytLabs
  </h1>
  <p>
      This repository is an archive of the (almost) original source code of the <a href="http://164.152.23.94">FlytLabs website</a>. I was the lead designer and developer of the startup and created this website for it. The original startup was founded on January 18, 2020 but our team has since disbanded.
  </p>
</div>

## ⚠️ Warning ⚠️
This project is no longer actively maintained. Issues may arise later if my VM shuts down.

## Technologies

> [!NOTE]
> This was originally a **LAMP stack** site, but the database has now been migrated to **SQLite**.

* **PHP** was used for the back end of the website.
* **SQLite**  was used to store community post updates and collect emails for our newsletter.
* **HTML** + **CSS** + **JS** was used for the front end.
* **Oracle Cloud** + **Linux** + **Apache** was used to deploy/host the website.

## Screenshots

More screenshots can be found on the [updates page](http://164.152.23.94/updates) of the website!

|                    <h3>Home (Dark)</h3>                    |                    <h3>Home (Light)</h3>                    |
| :--------------------------------------------------------: | :---------------------------------------------------------: |
| <img src="Images/Screenshots/Home (Dark).jpg" width="500"> | <img src="Images/Screenshots/Home (Light).jpg" width="500"> |

|                    <h3>Unifye (Dark)</h3>                    |                    <h3>Unifye (Light)</h3>                    |
| :----------------------------------------------------------: | :-----------------------------------------------------------: |
| <img src="Images/Screenshots/Unifye (Dark).jpg" width="500"> | <img src="Images/Screenshots/Unifye (Light).jpg" width="500"> |

|                    <h3>Mobile (Dark)</h3>                    |                    <h3>Mobile (Light)</h3>                    |
| :----------------------------------------------------------: | :-----------------------------------------------------------: |
| <img src="Images/Screenshots/Mobile (Dark).jpg" width="300"> | <img src="Images/Screenshots/Mobile (Light).jpg" width="300"> |

## How to Deploy

#### 1. Setup

- Open up your preferred terminal and clone this repository:

  ```
  git clone https://github.com/tthn0/FlytLabs.git
  ```

- In your preferred IDE or text editor, open the newly cloned repository.
  - Open `src/config/example.env`.
    - Change the `ADMIN_PASSWORD` to whatever you want (this will be explained later).
    - Ignore `IMGUR_CLIENT_ID` for now.
    - Rename the file to `.env`.
- Register a new [Imgur application](https://api.imgur.com/oauth2/addclient) (optional).

  > [!NOTE]
  > This step may be skipped if you don't care about posting images.

  - Sign in if needed.
  - Give your application a meaningful name.
  - For `Authorization type`, select `OAuth 2 authorization without a callback URL`.
  - Enter your email.
  - Fill out the CAPTCHA and submit.
  - Copy the `Client ID` provided into the `IMGUR_CLIENT_ID` field in `src/config/.env`.
- Switch back to your terminal, and make sure you're in the `src` directory of the project. To test the website's functionality, and run the following:

    ```bash
    php -S localhost:8080 -t public
    ```

  - Visit [localhost:8080](http://localhost:8080) in your browser.
  - In order to make a post, edit a previous post, or delete an existing post, you'll need to give yourself admin privileges:
    - Visit `/{ADMIN_PASSWORD}` (replace `{ADMIN_PASSWORD}` with the password you entered in the environment file earlier).
    - This will grant you admin privileges temporarily.

      > [!WARNING]
      > A bug may occur when editing a post. See [Notes + Things to Fix](#notes--things-to-fix) for more info.

  - Also, there is an API endpoint at [localhost:8080/api](http://localhost:8080/api) that will display all of the posts in JSON format.
    - To find a post w/ a specific ID, visit `/api?id={ID}`, where `{ID}` is the ID of the post you want to find.
    - This endpoint only accepts GET requests.
  - After making sure everything is working properly, go back into your terminal and kill the website.

#### 2. Host on Ubuntu Instance Using Oracle Cloud

- Sign into [Oracle Cloud](https://www.oracle.com/cloud/sign-in.html).
  - [Create a VM instance](https://cloud.oracle.com/compute/instances/create).
    - Give it a meaningful name.
    - Under `Placement`, make sure the `Availability domain` is `Always-Free-eligible`.
    - Under `Image and shape`, click `Change image` and select the latest version of Canonical Ubuntu and click `Select image`. Make sure both the image and shape are `Always-Free-eligible`.
    - Under `Networking`, choose an existing VCN and subnet or create a new one.
    - Under `Add SSH keys`, upload an existing public key file or generate a new one.
    - Click `Create`.
  - This step is optional if you'd like to run the website on a different port. On the reloaded page showing your newly created instance:
    - Under `Instance access`, take note of your `Public IP address` for later use.
    - Under `Primary VNIC`, click on your subnet's name.
    - Click on the default security list.
    - Click `Add Ingress Rules`.
      - Check `Stateless`.
      - Under `Source CIDR`, enter `0.0.0.0/0`.
      - Under `Destination Port Range`, enter any port.
      - Click `Add Ingress Rules`.


- To connect to the newly created instance, locate your private key file and run the following in your terminal:

  ```bash
  ssh -i /path/to/private.key ubuntu@164.152.23.94
  ```
  
  > [!IMPORTANT]
  > Make sure to use appropriate substitutions for the private key path, username, and public IP address of your instance for this step and all subsequent steps.

- Now we're ready to set up the VM.
  - Install PHP:

    ```bash
    sudo apt update
    sudo apt upgrade -y
    sudo apt autoremove
    sudo apt autoclean
    sudo apt install -y php php-sqlite3 apache2 apache2-doc apache2-utils
    ```

  - Make a `www` folder in your home directory:

    ```bash
    mkdir ~/www
    ```
    
  - Switch back to your local machine.
    - Open `src/pubilc/robots.txt`.
      - On line 4, change `164.152.23.94` to your VM's public IP address.
    - Open `src/pubilc/sitemap/sitemap.xml`.
      - Change all instances of `164.152.23.94` to your VM's public IP address.
    - Copy the FlytLabs directory to the VM:

      ```bash
      scp -i /path/to/private.key -r /path/to/FlytLabs ubuntu@164.152.23.94:~/www/FlytLabs
      ```

  - Now switching back to the VM, make sure your home directory has execute privileges:

    ```bash
    chmod +x /home/ubuntu
    ```

  - Ensure the database folder has write privileges:

    ```bash
    chmod -R a+w ~/www/FlytLabs/src/database
    ```

  - For now, we'll be using port `80` to serve the website, but you may choose any open port. Switching back to the VM, open up the port: 

    ```bash
    sudo iptables -I INPUT 6 -m state --state NEW -p tcp --dport 80 -j ACCEPT
    sudo netfilter-persistent save
    ```

  - Create a symlink to the configuration file and check if it correctly links:

    ```bash
    sudo ln -s ~/www/FlytLabs/src/config/FlytLabs.conf /etc/apache2/sites-available/FlytLabs.conf
    ```

    - If you decided to use another port (like `5000`), change `~/www/FlytLabs/src/config/FlytLabs.conf` to look like the following:

      ```apache
      Listen 5000
      <VirtualHost *:5000>
          DocumentRoot /home/ubuntu/www/FlytLabs/src/public
          ErrorLog /home/ubuntu/www/FlytLabs/src/logs/error.log
          CustomLog /home/ubuntu/www/FlytLabs/src/logs/access.log combined
          <Directory "/home/ubuntu/www/FlytLabs/src/public">
              Require all granted
              AllowOverride All
          </Directory>
      </VirtualHost>
      ```

  - Disable the default site, enable the newly created site, enable mod_rewrite, and reload apache2:

    ```bash
    sudo a2dissite 000-default.conf
    sudo a2ensite FlytLabs
    sudo a2enmod rewrite
    sudo systemctl reload apache2
    ```

  - Now everything should be up and running, publically available to the entire internet. Visit your public IP address in any browser to see!

#### 3. Add a Domain Name (Optional)

- Review Oracle's documentation page for [Creating a Public Zone](https://docs.oracle.com/en-us/iaas/Content/DNS/Concepts/gettingstarted_topic-Creating_a_Zone.htm#top).
- In your tenant's root compartment, create a zone for your domain, e.g. `example.com`.
- Create an two `A` zone records pointing to your public IP address.
  - `example.com` ⇒ `164.152.23.94`.
  - `www.example.com` ⇒ `164.152.23.94`.
- Publish the record.
- On your Registrar's DNS management console, update the name server records to point to Oracle Cloud's name servers assigned to the zone.

#### 4. Install SSL Certificate (Optional)

- Follow [this tutorial](https://www.digitalocean.com/community/tutorials/how-to-secure-apache-with-let-s-encrypt-on-ubuntu-20-04).

## Notes + Things to Fix

- If you're viewing a post in `/post` and want to edit it, pasting content from your clipboard results in pasting rich text. This is unwanted behavior and will result in a bug when saving the changes. Instead of pasting the usual way, use the keyboard shortcut:
  - `⌥ + ⌘ + ⇧ + V` if you're on macOS,
  - `Ctrl + Shift + V` if you're on Windows or Linux.
- Type hinting was not used in this codebase.
- Collecting emails for the newsletter is disabled by default. In order to enable it, locate `src/templates/components/footer.php` and uncomment lines 2-4.
- Pages for non-404 HTTP errors aren't implemented.