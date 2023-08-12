[//]: # (=======FIRST OF ALL ONCE YOU OPEN THIS FILE, OPEN THE ADVANCED MARKDOWN PREVIEW BY USING THE FOLLOWING COMMAND ON YOUR KEYBOARD.=======Windows : Ctrl + Shift + V========macOS: Cmd + Shift + V=======)

# Homeverse PHP System Installation Instructions

Follow these steps to install and set up the 'Homeverse' PHP system on your local machine.

## Step 1: Install XAMPP

1. Download XAMPP from the official website: [XAMPP Download Page](https://www.apachefriends.org/download.html)
2. Choose the appropriate version for your operating system (Windows, macOS, Linux) and download the installer.
3. Run the installer and follow the on-screen instructions to complete the installation.

## Step 2: Move 'Homeverse' Folder to XAMPP htdocs

1. After installing XAMPP, locate the installation directory. (For example, `C:\xampp` on Windows or `/opt/lampp` on Linux)
2. Inside the installation directory, find the `htdocs` folder. This is where your web files will be served from.
3. Move the 'Homeverse' folder to the `htdocs` directory.

## Step 3: Start XAMPP and Access 'Homeverse'

1. Start XAMPP:

   - On Windows: Run `xampp-control.exe` from the XAMPP installation directory.
   - On Linux: Open a terminal and run `sudo /opt/lampp/lampp start`.
   - On macOS: Open XAMPP from the Applications folder.

2. Open a web browser and enter the following URL to access 'Homeverse':
   http://localhost/homeverse

## Step 4: Set Up PHPMyAdmin and Create a Database

1. Access PHPMyAdmin:

- Open a web browser and go to: `http://localhost/phpmyadmin`

2. Log in using your XAMPP credentials (default username: `root`, default password: leave blank).

3. Create a 'homeverse' Database:

- Click on "New" in the left sidebar.
- Enter "homeverse" as the database name and select `utf8mb4_general_ci` as the collation.
- Click on "Create" to create the database.

## Step 5: Import Database SQL File

1. In PHPMyAdmin, select the 'homeverse' database from the left sidebar.

2. Click on the "Import" tab in the top menu.

3. Click on the "Choose File" button, locate the SQL file for the 'Homeverse' database (provided with the system), and click "Open".

4. Click "Go" to start the import. Once completed, you'll have the necessary tables and data.

## Step 6: Open 'Homeverse' Project

1. In your web browser, open a new tab and go to:
   http://localhost/homeverse

This will open the 'Homeverse' PHP system.

Congratulations! You've successfully installed and set up the 'Homeverse' PHP system on your local machine.

If you encounter any issues during the installation, refer to the documentation or seek help from the community.
