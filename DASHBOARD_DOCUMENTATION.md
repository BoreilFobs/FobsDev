# FobsDev Portfolio Dashboard - Documentation

## Overview
A complete dashboard system has been created for managing your portfolio dynamically. You can now add, edit, and delete portfolio items through an admin panel without touching code.

## Features
✅ Full CRUD operations for portfolio items
✅ Image upload functionality
✅ Active/Inactive status control
✅ Custom ordering of portfolio items
✅ Secure authentication system
✅ Responsive admin dashboard
✅ Dynamic portfolio display on homepage

## Database Structure

### Portfolio Items Table
- `id` - Unique identifier
- `title` - Project title
- `category` - Project category (Web Development, App Development, etc.)
- `description` - Detailed project description
- `main_image` - Main portfolio image path
- `gallery_images` - Additional images (JSON array)
- `url` - Project detail page URL
- `is_active` - Show/hide on portfolio
- `order` - Display order (lower numbers first)
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

## Initial Data
Your three existing projects have been seeded:
1. **FobsSMS** - School Management System
2. **EDUCAM** - GCE Revision Platform
3. **Glow & Chic** - E-commerce Platform

## Admin Access

### Login Credentials
- **URL**: `http://your-domain.com/admin/login`
- **Email**: `admin@fobsdev.com`
- **Password**: `password123`

**⚠️ IMPORTANT**: Change these credentials immediately for security!

## How to Use the Dashboard

### 1. Login
Visit `/admin/login` and enter your credentials.

### 2. Dashboard Overview
After login, you'll see:
- Total projects count
- Active projects count
- Inactive projects count
- Quick action buttons

### 3. Managing Portfolio Items

#### View All Items
- Click "Portfolio Items" in the sidebar
- See all projects in a table view
- View status, order, and creation date

#### Add New Project
1. Click "Add New Project" button
2. Fill in the form:
   - **Title**: Project name
   - **Category**: Type of project
   - **Description**: Detailed information
   - **Main Image**: Primary project image
   - **Gallery Images**: Additional images (optional)
   - **Project URL**: Link to project details (optional)
   - **Display Order**: Position in portfolio
   - **Status**: Active or Inactive
3. Click "Create Project"

#### Edit Existing Project
1. Click the pencil icon on any project
2. Update any fields you want to change
3. Upload new images if needed (old images are kept if not updated)
4. Click "Update Project"

#### Delete Project
1. Click the trash icon on any project
2. Confirm deletion

### 4. Logout
Click "Logout" in the sidebar when done.

## File Upload Guidelines

### Image Requirements
- **Formats**: JPEG, PNG, JPG, GIF
- **Max Size**: 2MB per image
- **Recommended Size**: 800x600px for best display

### Upload Location
Images are stored in: `public/assets/img/portfolio/{project-title}/`

## Routes Reference

### Public Routes
- `/` - Homepage with portfolio
- `/admin/login` - Admin login page

### Protected Routes (Requires Authentication)
- `/dashboard` - Dashboard overview
- `/dashboard/portfolio` - List all portfolio items
- `/dashboard/portfolio/create` - Add new item
- `/dashboard/portfolio/{id}/edit` - Edit item
- `/dashboard/portfolio/{id}` - Delete item (POST with DELETE method)

## Security Features

1. **Authentication Required**: All dashboard routes are protected
2. **CSRF Protection**: All forms include CSRF tokens
3. **Input Validation**: All user inputs are validated
4. **File Type Validation**: Only images are accepted

## Customization Tips

### Change Display Order
- Lower numbers appear first
- Use gaps (e.g., 10, 20, 30) to allow easy reordering later

### Hide Projects Temporarily
- Set status to "Inactive" instead of deleting
- Great for seasonal or work-in-progress projects

### Organize by Category
- Use consistent category names
- Examples: "Web Development", "App Development", "UI/UX Design"

## Troubleshooting

### Can't Login?
- Verify email: `admin@fobsdev.com`
- Verify password: `password123`
- Check database connection

### Images Not Showing?
- Ensure `public/assets/img/portfolio/` folder has write permissions
- Check image file size (max 2MB)
- Verify image format is supported

### Portfolio Not Updating on Homepage?
- Clear browser cache
- Check if project is set to "Active"
- Verify database connection

## Creating a New Admin User

Run this command in terminal:
```bash
php artisan tinker --execute="App\Models\User::create(['name' => 'Your Name', 'email' => 'your@email.com', 'password' => bcrypt('your-password')]);"
```

## Updating Your Password

1. Access the database directly, or
2. Add a password reset feature (future enhancement), or
3. Use tinker:
```bash
php artisan tinker
$user = App\Models\User::where('email', 'admin@fobsdev.com')->first();
$user->password = bcrypt('new-password');
$user->save();
```

## Future Enhancements (Optional)

Consider adding:
- [ ] Password reset functionality
- [ ] Multiple admin users with roles
- [ ] Project categories management
- [ ] Bulk image upload
- [ ] Image cropping/resizing
- [ ] Analytics dashboard
- [ ] Contact form management
- [ ] SEO metadata for projects
- [ ] Draft/Published workflow
- [ ] Activity logs

## Technical Stack

- **Framework**: Laravel 11
- **Frontend**: Bootstrap 5.3, Bootstrap Icons
- **Database**: MySQL/MariaDB
- **Authentication**: Laravel's built-in auth
- **File Uploads**: Native PHP file handling

## Support

For issues or questions about the dashboard system, refer to:
- Laravel Documentation: https://laravel.com/docs
- Bootstrap Documentation: https://getbootstrap.com/docs

---

**Created**: November 25, 2025
**Version**: 1.0
**Developer**: FobsDev Dashboard System
