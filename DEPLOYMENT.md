# Deployment Guide for Wasmer.io

## Prerequisites
1. Your code is pushed to GitHub repository: `Manojkumar241202/Agroculture`
2. You have a Wasmer.io account

## Step-by-Step Deployment

### 1. Database Configuration
The `db.php` file has been updated to use environment variables that Wasmer.io provides automatically when you enable the database.

**Environment Variables Provided by Wasmer:**
- `DB_HOST` - Database host
- `DB_NAME` - Database name
- `DB_USERNAME` - Database username
- `DB_PASSWORD` - Database password
- `DB_PORT` - Database port (default: 3306)

### 2. Wasmer.io Configuration Steps

#### Step 1: Connect GitHub Repository
1. Go to [Wasmer.io](https://wasmer.io)
2. Click "Deploy from GitHub"
3. Select your repository: `Manojkumar241202/Agroculture`
4. Choose the branch (usually `main` or `master`)

#### Step 2: Configure Project Settings
- **Owner:** Select your account (e.g., `manojkumar241202`)
- **Project Name:** `Agroculture` (or your preferred name)
- **Project Preset:** `PHP`
- **PHP Version:** `8.3` (or latest stable)
- **PHP Architecture:** `64-bit` (recommended over 32-bit for better performance)

#### Step 3: Enable Database
- **Toggle ON** "Enable Database"
- Wasmer will automatically set up MySQL v8.4
- The connection details will be available as environment variables:
  - `DB_HOST`
  - `DB_NAME`
  - `DB_USERNAME`
  - `DB_PASSWORD`
  - `DB_PORT`

#### Step 4: Build Settings
**Important:** A `composer.json` file has been created for Wasmer compatibility. Configure as follows:

- **Start Command:** Leave as "None"
- **Build Command:** Leave as "None"  
- **Install Command:** Leave as "None" OR set to `composer install --no-dev --no-scripts` (this will run quickly since there are no dependencies)

**Note:** Even though the app doesn't use Composer dependencies, Wasmer requires `composer.json` to be present. The file has been created with minimal configuration.

#### Step 5: Environment Variables (Optional)
If you have any additional environment variables, you can add them in the "Environment variables" section.

### 3. Database Setup

**Important:** Wasmer.io automatically creates the MySQL database for you, but you need to create the tables manually.

#### Option 1: Automatic Setup (Recommended - Easiest)

1. After your app is deployed, visit:
   ```
   https://your-app-name.wasmer.app/setup_database.php
   ```

2. The script will automatically create all required tables.

3. **⚠️ SECURITY:** Delete `setup_database.php` after setup is complete!

#### Option 2: Manual Setup via Wasmer Dashboard

1. **Get Database Connection Details:**
   - Go to your app's dashboard on Wasmer.io
   - Navigate to the Database section
   - You'll see the connection details (DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD, DB_PORT)

2. **Import Database Schema:**
   - Option A: Use Wasmer's database management interface (if available)
   - Option B: Connect via MySQL client (like MySQL Workbench, phpMyAdmin, or command line)
   - Use the file: `agroculture_wasmer.sql` (this is a clean version without database creation)

3. **Connect and Import:**
   ```bash
   # Using MySQL command line
   mysql -h $DB_HOST -u $DB_USERNAME -p$DB_PASSWORD $DB_NAME < agroculture_wasmer.sql
   ```

#### Option 3: Manual Setup via phpMyAdmin (if available)

1. Access Wasmer's database management interface
2. Select your database
3. Go to "Import" tab
4. Upload `agroculture_wasmer.sql`
5. Click "Go" to execute

#### What Gets Created:

The following tables will be created:
- `blogdata` - Blog posts
- `blogfeedback` - Blog comments
- `farmer` - Farmer accounts
- `buyer` - Buyer accounts
- `fproduct` - Products
- `mycart` - Shopping cart
- `review` - Product reviews
- `transaction` - Orders/transactions
- `likedata` - Blog likes

### 4. File Upload Considerations

**Important:** Wasmer.io uses ephemeral file systems. Uploaded files (images) will be lost on redeployment.

**Solutions:**
1. **Use Cloud Storage:** Integrate with AWS S3, Cloudinary, or similar services
2. **Use Wasmer Persistent Storage:** If available in your plan
3. **Database Storage:** Store images as base64 in database (not recommended for large files)

### 5. Deploy

1. Click the **"Deploy"** button
2. Wait for deployment (usually less than 30 seconds)
3. Your app will be live at: `https://your-project-name.wasmer.app`

### 6. Post-Deployment Checklist

- [ ] **Run database setup** - Visit `https://your-app.wasmer.app/setup_database.php` OR manually import `agroculture_wasmer.sql`
- [ ] **Delete setup_database.php** - Remove the setup script for security after tables are created
- [ ] Verify database connection works
- [ ] Test user registration (create a test farmer/buyer account)
- [ ] Test login functionality
- [ ] Test product upload (if using cloud storage)
- [ ] Test blog functionality
- [ ] Verify all images load correctly
- [ ] Test shopping cart and checkout flow

### 7. Troubleshooting

#### Build/Deployment Errors

**Error: `FileNotFoundError: composer.json`**
- ✅ **Fixed:** A `composer.json` file has been added to the repository
- Make sure you've committed and pushed `composer.json` to GitHub
- If the error persists, try setting **Install Command** to: `composer install --no-dev --no-scripts`

**Error: `App was not deployed`**
- Check the build logs in Wasmer dashboard for specific errors
- Ensure all required files are committed to GitHub
- Verify PHP version compatibility (should be 8.3 or compatible)

#### Database Connection Issues
- Verify environment variables are set correctly
- Check database is enabled and running
- Ensure `db.php` uses `getenv()` correctly
- Test connection by visiting `setup_database.php` after deployment

#### File Upload Issues
- Check file permissions on upload directories
- Verify upload directory exists: `images/productImages/` and `images/profileImages/`
- Consider using cloud storage for production

#### Session Issues
- Ensure sessions are properly configured
- Check if Wasmer.io requires specific session configuration

### 8. Continuous Deployment

Wasmer.io automatically deploys on every push to your GitHub repository's main branch. No additional configuration needed!

## Security Notes

⚠️ **Important Security Considerations:**

1. **Remove Hardcoded Credentials:** The updated `db.php` now uses environment variables, but make sure to:
   - Never commit actual database passwords to GitHub
   - Use environment variables for all sensitive data

2. **SQL Injection:** Consider using prepared statements instead of direct string interpolation in SQL queries

3. **File Upload Security:** 
   - Validate file types and sizes
   - Scan uploaded files for malware
   - Use cloud storage for production

## Support

For Wasmer.io specific issues, refer to:
- [Wasmer.io Documentation](https://docs.wasmer.io)
- [Wasmer.io Support](https://wasmer.io/support)

