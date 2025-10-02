
# Logo Setup Instructions for Bharatpur Foundation

## Adding Your Logo

1. **Prepare your logo files:**
   - Main logo: Save as `bharatpur-logo.png` (recommended: 200x60px or similar aspect ratio)
   - White/light version for dark backgrounds: Save as `bharatpur-logo-white.png`

2. **Upload to the correct location:**
   - Place both logo files in: `public/assets/images/`

3. **Logo formats supported:**
   - PNG (recommended for logos with transparency)
   - JPG/JPEG (for photos)
   - SVG (for scalable vector logos)

## Current Logo Placement

The logo will appear in:
- **Navbar**: Top-left corner, 40px height
- **Footer**: 30px height with white version
- **Hero section**: 80px height, centered with text

## Color Scheme Applied

Based on typical foundation colors, I've set:
- **Primary**: Deep blue (#1a365d)
- **Secondary**: Golden yellow (#d69e2e)
- **Accent**: Deep red (#c53030)

## Customizing Colors

To match your exact logo colors:
1. Open `public/assets/css/bharatpur-theme.css`
2. Update the color variables in the `:root` section
3. Save the file

## File Structure
```
public/
├── assets/
│   ├── images/
│   │   ├── bharatpur-logo.png          <- Your main logo here
│   │   └── bharatpur-logo-white.png    <- White version here
│   └── css/
│       └── bharatpur-theme.css         <- Custom styling
```

## Next Steps
1. Upload your logo files to the images directory
2. Test the website to see how it looks
3. Adjust colors if needed in the theme CSS file
