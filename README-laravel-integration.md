# Edumark Frontend Integration Guide for Laravel 11

This guide provides all the necessary steps to integrate the provided static frontend assets (Blade templates, CSS, JS, images) into a fresh Laravel 11 project.

## 1. File Placement

Copy the provided folders and files into your Laravel project directory as follows:

-   Copy the entire `resources/views/` folder structure into your project's `resources/` directory. This contains all the Blade layouts, pages, and partials.
-   Replace `resources/css/app.css` with the provided file.
-   Replace `resources/js/app.js` with the provided file.
-   Create the `public/assets/` directory and place all required images and fonts inside. See the **Asset List** section below.
-   Copy the content of `tailwind.config.js` and `postcss.config.js` into the corresponding files at the root of your Laravel project.

## 2. Frontend Dependencies & Configuration

1.  **Install Node.js dependencies:**
    Open your terminal in the project root and run:
    ```bash
    npm install
    ```

2.  **Initialize Tailwind CSS (if needed):**
    If you do not have `tailwind.config.js` and `postcss.config.js` files, run this command to create them:
    ```bash
    npx tailwindcss init -p
    ```

3.  **Configure `tailwind.config.js`:**
    Replace the contents of your `tailwind.config.js` with the provided version. It is already configured with the correct content paths, fonts, and colors.

4.  **Run the Vite development server:**
    In your terminal, run the following command to compile assets as you make changes:
    ```bash
    npm run dev
    ```
    
    In a separate terminal, run the PHP server:
    ```bash
    php artisan serve
    ```

## 3. Routes

Replace the content of your `routes/web.php` file with the provided version to link all the pages correctly.

## 4. Asset List

You need to download the following images and place them in the corresponding `public/assets/` subdirectories.

**Images (`public/assets/images/`):**
- `https://i.imgur.com/GzC5F1p.png` -> `welcome-laptop.png`
- `https://i.imgur.com/0iSgev1.png` -> `info-diagram.png`
- `https://i.imgur.com/zJ5rBgS.png` -> `directory-header-icon.png`
- `https://i.imgur.com/eBiep4u.png` -> `cohort-growth-marketing.png`
- `https://i.imgur.com/i9PQL9r.png` -> `cohort-advanced-seo.png`
- `https://i.imgur.com/b2wSgP9.png` -> `cohort-video-marketing.png`
- `https://i.imgur.com/D4s2Q1h.png` -> `cohort-content-marketing.png`
- `https://i.imgur.com/0FwWWc5.png` -> `event-placeholder.png`
- `https://i.imgur.com/97y4ONJ.png` -> `discussion-featured-1.png`
- `https://i.imgur.com/sM7h8Ab.png` -> `discussion-featured-2.png`
- `https://i.imgur.com/k6P0g32.png` -> `connect-diagram.png`
- `https://i.imgur.com/2mP22F1.png` -> `showcase-1.png`
- `https://i.imgur.com/WlAhg26.png` -> `showcase-2.png`
- `https://i.imgur.com/gOqY6sX.png` -> `bettermode-icon.png`

**Avatars (`public/assets/images/avatars/`):**
- `https://i.imgur.com/L6epf2S.jpg` -> `daniel-wilson.jpg`
- `https://i.imgur.com/ncn2a2s.jpg` -> `david-anderson.jpg`
- `https://i.imgur.com/D886a1f.jpg` -> `emily-davis.jpg`
- `https://i.imgur.com/Ftn8NTd.jpg` -> `jennifer-white.jpg`
- `https://i.imgur.com/A45e43f.jpg` -> `jessica-harris.jpg`
- `https://i.imgur.com/v13w4G9.jpg` -> `john-carter.jpg`
- `https://i.imgur.com/Q2ETN2E.jpg` -> `mike-johnson.jpg`
- `https://i.imgur.com/lEa2QkO.jpg` -> `sarah-miller.jpg`
- `https://i.imgur.com/lG3P7Yv.jpg` -> `chris-lee.jpg`
- `https://i.imgur.com/gOqY6sX.png` -> `edumark-team-icon.png`

**Fonts (`public/assets/fonts/`):**
- Download the "Inter" font family from a source like Google Fonts and place the `.woff2` files in this directory. The provided `app.css` is already set up to load them (`Inter-Regular`, `Inter-Medium`, `Inter-SemiBold`, `Inter-Bold`, `Inter-ExtraBold`).
