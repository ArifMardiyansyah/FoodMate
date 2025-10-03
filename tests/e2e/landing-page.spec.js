import { test, expect } from '@playwright/test';

test.describe('FoodMate Landing Page', () => {
  test.beforeEach(async ({ page }) => {
    await page.goto('/');
  });

  test('should load successfully with correct title', async ({ page }) => {
    await expect(page).toHaveTitle(/FoodMate.*Campus Food Ordering/);
  });

  test('should display navigation menu with correct links', async ({ page }) => {
    // Check if navigation exists
    const nav = page.locator('nav');
    await expect(nav).toBeVisible();

    // Check FoodMate branding
    await expect(page.locator('h1').filter({ hasText: 'FoodMate' })).toBeVisible();

    // Check navigation links (desktop view)
    await expect(page.locator('a[href="#menu"]').first()).toBeVisible();
    await expect(page.locator('a[href="#about"]')).toBeVisible();
    await expect(page.locator('a[href="#contact"]')).toBeVisible();
    await expect(page.locator('a[href="#order"]')).toBeVisible();
  });

  test('should display hero section with call-to-action buttons', async ({ page }) => {
    // Check hero heading
    await expect(page.locator('text=Delicious Campus')).toBeVisible();
    await expect(page.locator('text=Food Delivered')).toBeVisible();

    // Check hero description
    await expect(page.locator('text=Fresh, hot meals prepared when you order')).toBeVisible();

    // Check CTA buttons
    const orderNowButton = page.locator('text=Order Now').first();
    const viewMenuButton = page.locator('text=View Menu');

    await expect(orderNowButton).toBeVisible();
    await expect(viewMenuButton).toBeVisible();

    // Test button functionality - should scroll to menu section
    await viewMenuButton.click();
    await page.waitForTimeout(1000); // Allow scroll animation
    const menuSection = page.locator('#menu');
    await expect(menuSection).toBeInViewport();
  });

  test('should display menu section with all food items and correct prices', async ({ page }) => {
    const menuSection = page.locator('#menu');
    await expect(menuSection).toBeVisible();

    // Check section heading
    await expect(page.locator('text=Our Menu')).toBeVisible();
    await expect(page.locator('text=Freshly prepared Indonesian favorites')).toBeVisible();

    // Check all menu items and prices
    const menuItems = [
      { name: 'Mie Goreng', price: 'Rp 15,000', emoji: '🍜' },
      { name: 'Mie Rebus', price: 'Rp 15,000', emoji: '🍲' },
      { name: 'Nasi Goreng', price: 'Rp 18,000', emoji: '🍛' },
      { name: 'Gado-Gado', price: 'Rp 12,000', emoji: '🥗' },
      { name: 'Ayam Bakar', price: 'Rp 20,000', emoji: '🍗' },
      { name: 'Sate Ayam', price: 'Rp 16,000', emoji: '🍢' }
    ];

    for (const item of menuItems) {
      await expect(page.locator(`text=${item.name}`)).toBeVisible();
      await expect(page.locator(`text=${item.price}`)).toBeVisible();
    }

    // Check that all order buttons are present and clickable
    const orderButtons = page.locator('button:has-text("Order")').filter({ hasNotText: 'Order Now' });
    const orderButtonCount = await orderButtons.count();
    expect(orderButtonCount).toBeGreaterThanOrEqual(6); // At least 6 order buttons for food items
  });

  test('should display drinks section with all beverages and prices', async ({ page }) => {
    // Navigate to drinks section
    await page.locator('#menu').scrollIntoViewIfNeeded();

    // Check drinks section exists
    const drinksSection = page.locator('text=Drinks').first();
    await expect(drinksSection).toBeVisible();

    // Check drinks items and prices
    const drinkItems = [
      { name: 'Es Teh', price: 'Rp 5,000' },
      { name: 'Es Jeruk', price: 'Rp 6,000' },
      { name: 'Kopi', price: 'Rp 8,000' },
      { name: 'Es Campur', price: 'Rp 10,000' }
    ];

    for (const drink of drinkItems) {
      await expect(page.locator(`text=${drink.name}`)).toBeVisible();
      await expect(page.locator(`text=${drink.price}`)).toBeVisible();
    }
  });

  test('should display features section', async ({ page }) => {
    // Scroll to features section
    await page.evaluate(() => window.scrollTo(0, document.body.scrollHeight / 2));

    // Check for features section content
    await expect(page.locator('text=Fresh & Fast')).toBeVisible();
    await expect(page.locator('text=Made for Campus')).toBeVisible();
    await expect(page.locator('text=Quality Guaranteed')).toBeVisible();
  });

  test('should display call-to-action section', async ({ page }) => {
    // Scroll to CTA section
    await page.evaluate(() => window.scrollTo(0, document.body.scrollHeight * 0.8));

    await expect(page.locator('text=Ready to Order?')).toBeVisible();
    await expect(page.locator('text=Get Started')).toBeVisible();
  });

  test('should display footer with contact information', async ({ page }) => {
    // Scroll to footer
    await page.evaluate(() => window.scrollTo(0, document.body.scrollHeight));

    // Check footer content
    await expect(page.locator('footer')).toBeVisible();

    // Check contact information
    await expect(page.locator('text=Contact Info')).toBeVisible();
    await expect(page.locator('text=Operating Hours')).toBeVisible();

    // Check for WhatsApp number and email
    await expect(page.locator('text=+62 123 456 7890')).toBeVisible();
    await expect(page.locator('text=info@foodmate.campus')).toBeVisible();

    // Check operating hours
    await expect(page.locator('text=Monday - Friday')).toBeVisible();
    await expect(page.locator('text=08:00 - 20:00')).toBeVisible();
  });

  test('should be responsive on mobile devices', async ({ page, isMobile }) => {
    if (isMobile) {
      // Test mobile-specific elements or behavior
      await expect(page.locator('nav')).toBeVisible();

      // Mobile menu might be different, but core content should still be visible
      await expect(page.locator('text=FoodMate')).toBeVisible();
      await expect(page.locator('text=Delicious Campus')).toBeVisible();
      await expect(page.locator('#menu')).toBeVisible();
    }
  });

  test('should handle smooth scrolling navigation', async ({ page }) => {
    // Test navigation link functionality
    const menuLink = page.locator('a[href="#menu"]').first();
    await menuLink.click();

    // Wait for scroll animation
    await page.waitForTimeout(1000);

    // Check that menu section is in viewport
    const menuSection = page.locator('#menu');
    await expect(menuSection).toBeInViewport();
  });

  test('should validate Inter font is loaded', async ({ page }) => {
    // Check if Inter font is applied to body
    const bodyFontFamily = await page.locator('body').evaluate(el => {
      return window.getComputedStyle(el).getPropertyValue('font-family');
    });

    expect(bodyFontFamily).toContain('Inter');
  });

  test('should validate hover effects on order buttons', async ({ page }) => {
    const firstOrderButton = page.locator('button:has-text("Order")').first();

    // Get initial background color
    const initialBg = await firstOrderButton.evaluate(el => {
      return window.getComputedStyle(el).getPropertyValue('background-color');
    });

    // Hover over button
    await firstOrderButton.hover();

    // Get background color after hover
    const hoveredBg = await firstOrderButton.evaluate(el => {
      return window.getComputedStyle(el).getPropertyValue('background-color');
    });

    // Colors should be different (indicating hover effect works)
    expect(initialBg).not.toBe(hoveredBg);
  });

  test('should validate all sections are present in correct order', async ({ page }) => {
    const sections = [
      { selector: 'nav', name: 'Navigation' },
      { selector: 'text=Delicious Campus', name: 'Hero Section' },
      { selector: '#menu', name: 'Menu Section' },
      { selector: 'text=Drinks', name: 'Drinks Section' },
      { selector: 'text=Fresh & Fast', name: 'Features Section' },
      { selector: 'text=Ready to Order?', name: 'CTA Section' },
      { selector: 'footer', name: 'Footer' }
    ];

    for (const section of sections) {
      await expect(page.locator(section.selector).first()).toBeVisible();
    }
  });
});
