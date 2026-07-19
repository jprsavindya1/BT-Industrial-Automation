<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class OwnerDashboardTest extends TestCase
{
    use RefreshDatabase;

    protected User $owner;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a default admin/owner user for tests
        $this->owner = User::create([
            'name' => 'BT Admin',
            'email' => 'admin@btautomation.lk',
            'password' => bcrypt('Admin@BT2026!'),
        ]);
    }

    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get(route('owner.dashboard'));
        $response->assertRedirect(route('login'));

        $response = $this->get(route('owner.products.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_login_renders_and_owner_can_authenticate(): void
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);

        $response = $this->post(route('login'), [
            'email' => 'admin@btautomation.lk',
            'password' => 'Admin@BT2026!',
        ]);

        $response->assertRedirect(route('owner.dashboard'));
        $this->assertAuthenticatedAs($this->owner);
    }

    public function test_dashboard_renders_for_owner(): void
    {
        $response = $this->actingAs($this->owner)->get(route('owner.dashboard'));
        $response->assertStatus(200);
        $response->assertSee('Dashboard Overview');
    }

    public function test_owner_can_manage_categories(): void
    {
        // 1. Create
        $response = $this->actingAs($this->owner)->post(route('owner.categories.store'), [
            'name' => 'New Solar Modules',
            'description' => 'Test Category Description',
            'icon' => 'sun',
        ]);
        $response->assertRedirect(route('owner.categories.index'));
        $this->assertDatabaseHas('categories', [
            'name' => 'New Solar Modules',
            'slug' => 'new-solar-modules',
            'icon' => 'sun',
        ]);

        $category = Category::where('slug', 'new-solar-modules')->first();
        $this->assertNotNull($category);

        // 2. Update
        $response = $this->actingAs($this->owner)->put(route('owner.categories.update', $category->id), [
            'name' => 'Solar Advanced',
            'description' => 'Updated Category',
            'icon' => 'activity',
        ]);
        $response->assertRedirect(route('owner.categories.index'));
        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => 'Solar Advanced',
            'slug' => 'solar-advanced',
            'icon' => 'activity',
        ]);

        // 3. Delete
        $response = $this->actingAs($this->owner)->delete(route('owner.categories.destroy', $category->id));
        $response->assertRedirect(route('owner.categories.index'));
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    public function test_owner_can_manage_products(): void
    {
        $category = Category::create([
            'name' => 'PLCs & Controllers',
            'slug' => 'plcs-controllers',
            'icon' => 'cpu',
        ]);

        // 1. Create
        $response = $this->actingAs($this->owner)->post(route('owner.products.store'), [
            'category_id' => $category->id,
            'name' => 'Test PLC Component',
            'description' => 'A test description for PLC controller',
            'price' => 5000.50,
            'spec_keys' => ['CPU Model', 'RAM'],
            'spec_values' => ['1214C', '256KB'],
        ]);

        $response->assertRedirect(route('owner.products.index'));
        $this->assertDatabaseHas('products', [
            'name' => 'Test PLC Component',
            'slug' => 'test-plc-component',
            'price' => 5000.50,
        ]);

        $product = Product::where('slug', 'test-plc-component')->first();
        $this->assertNotNull($product);
        $this->assertEquals('1214C', $product->specifications['CPU Model']);
        $this->assertEquals('256KB', $product->specifications['RAM']);

        // 2. Update
        $response = $this->actingAs($this->owner)->put(route('owner.products.update', $product->id), [
            'category_id' => $category->id,
            'name' => 'Updated PLC Component',
            'description' => 'Updated test description',
            'price' => 6000.00,
            'is_featured' => '1',
            'spec_keys' => ['CPU Model', 'RAM', 'Ports'],
            'spec_values' => ['1214C', '512KB', 'PROFINET'],
        ]);

        $response->assertRedirect(route('owner.products.index'));
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated PLC Component',
            'slug' => 'updated-plc-component',
            'price' => 6000.00,
            'is_featured' => true,
        ]);

        $updatedProduct = Product::find($product->id);
        $this->assertNotNull($updatedProduct);
        $this->assertEquals('512KB', $updatedProduct->specifications['RAM']);
        $this->assertEquals('PROFINET', $updatedProduct->specifications['Ports']);

        // 3. Delete
        $response = $this->actingAs($this->owner)->delete(route('owner.products.destroy', $product->id));
        $response->assertRedirect(route('owner.products.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_owner_can_update_password(): void
    {
        $response = $this->actingAs($this->owner)->put(route('owner.settings.password'), [
            'current_password' => 'Admin@BT2026!',
            'password' => 'NewSecurePassword123!',
            'password_confirmation' => 'NewSecurePassword123!',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
        $this->assertTrue(Hash::check('NewSecurePassword123!', $this->owner->fresh()->password));
    }

    public function test_owner_can_manage_product_gallery(): void
    {
        $category = Category::create([
            'name' => 'PLCs & Controllers',
            'slug' => 'plcs-controllers',
            'icon' => 'cpu',
        ]);

        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'PLC Unit',
            'slug' => 'plc-unit',
            'price' => 100,
        ]);

        \Illuminate\Support\Facades\Storage::fake('public');
        $file = \Illuminate\Http\UploadedFile::fake()->create('gallery1.jpg', 100, 'image/jpeg');

        $response = $this->actingAs($this->owner)->put(route('owner.products.update', $product->id), [
            'category_id' => $category->id,
            'name' => 'PLC Unit',
            'price' => 100,
            'gallery' => [$file]
        ]);

        $response->assertRedirect(route('owner.products.index'));
        $this->assertDatabaseHas('product_gallery_images', [
            'product_id' => $product->id,
        ]);

        $galleryImage = \App\Models\ProductGalleryImage::where('product_id', $product->id)->first();
        $this->assertNotNull($galleryImage);

        $response = $this->actingAs($this->owner)->delete(route('owner.products.gallery-image.destroy', $galleryImage->id));
        $response->assertJson(['success' => true]);
        $this->assertDatabaseMissing('product_gallery_images', ['id' => $galleryImage->id]);
    }

    public function test_search_suggestions_api(): void
    {
        $category = Category::create([
            'name' => 'PLCs & Controllers',
            'slug' => 'plcs-controllers',
            'icon' => 'cpu',
        ]);

        $product1 = Product::create([
            'category_id' => $category->id,
            'name' => 'Siemens SIMATIC S7-1200 PLC',
            'slug' => 'siemens-simatic-s7-1200-plc',
            'price' => 55000.00,
            'description' => 'Compact CPU with high performance.',
        ]);

        $product2 = Product::create([
            'category_id' => $category->id,
            'name' => 'Delta HMI Panel',
            'slug' => 'delta-hmi-panel',
            'price' => 25000.00,
            'description' => 'Industrial touch panel interface.',
        ]);

        // 1. Test short query (should return empty response)
        $response = $this->get(route('products.suggestions', ['query' => 'a']));
        $response->assertStatus(200);
        $response->assertJson([]);

        // 2. Test query matching "PLC"
        $response = $this->get(route('products.suggestions', ['query' => 'PLC']));
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => 'Siemens SIMATIC S7-1200 PLC',
            'price' => '55,000.00',
            'category' => 'PLCs & Controllers',
        ]);
        $response->assertJsonMissing([
            'name' => 'Delta HMI Panel',
        ]);

        // 3. Test query matching "panel"
        $response = $this->get(route('products.suggestions', ['query' => 'panel']));
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => 'Delta HMI Panel',
            'price' => '25,000.00',
            'category' => 'PLCs & Controllers',
        ]);
        $response->assertJsonMissing([
            'name' => 'Siemens SIMATIC S7-1200 PLC',
        ]);
    }

    public function test_catalog_advanced_filtering(): void
    {
        $category = Category::create([
            'name' => 'PLCs & Controllers',
            'slug' => 'plcs-controllers',
            'icon' => 'cpu',
        ]);

        Product::create([
            'category_id' => $category->id,
            'name' => 'Low Price Item',
            'slug' => 'low-price-item',
            'price' => 5000.00,
            'is_featured' => false,
        ]);

        Product::create([
            'category_id' => $category->id,
            'name' => 'Medium Price Featured Item',
            'slug' => 'medium-price-featured-item',
            'price' => 15000.00,
            'is_featured' => true,
        ]);

        Product::create([
            'category_id' => $category->id,
            'name' => 'High Price Item',
            'slug' => 'high-price-item',
            'price' => 50000.00,
            'is_featured' => false,
        ]);

        // 1. Min Price filtering
        $response = $this->get(route('products.index', ['min_price' => 10000]));
        $response->assertStatus(200);
        $response->assertSee('Medium Price Featured Item');
        $response->assertSee('High Price Item');
        $response->assertDontSee('Low Price Item');

        // 2. Max Price filtering
        $response = $this->get(route('products.index', ['max_price' => 20000]));
        $response->assertStatus(200);
        $response->assertSee('Low Price Item');
        $response->assertSee('Medium Price Featured Item');
        $response->assertDontSee('High Price Item');

        // 3. Featured filtering
        $response = $this->get(route('products.index', ['featured' => '1']));
        $response->assertStatus(200);
        $response->assertSee('Medium Price Featured Item');
        $response->assertDontSee('Low Price Item');
        $response->assertDontSee('High Price Item');
    }

    public function test_client_can_submit_valid_testimonial(): void
    {
        $response = $this->post(route('testimonials.store'), [
            'name' => 'John Doe',
            'role' => 'Project Lead',
            'company' => 'Dynamic Systems',
            'rating' => 4,
            'content' => 'This is a fantastic automation service that helped our assembly lines run smoothly.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success_review');
        $this->assertDatabaseHas('testimonials', [
            'name' => 'John Doe',
            'role' => 'Project Lead',
            'company' => 'Dynamic Systems',
            'rating' => 4,
            'is_approved' => false,
        ]);
    }

    public function test_owner_can_manage_testimonials(): void
    {
        $testimonial = \App\Models\Testimonial::create([
            'name' => 'Jane Smith',
            'role' => 'Manager',
            'company' => 'Precision Automation',
            'rating' => 5,
            'content' => 'Outstanding support and fast response times on custom sensors ordering.',
            'is_approved' => false,
        ]);

        // 1. Index Access
        $response = $this->actingAs($this->owner)->get(route('owner.testimonials.index'));
        $response->assertStatus(200);
        $response->assertSee('Jane Smith');

        // 2. Toggle Approve (to true)
        $response = $this->actingAs($this->owner)->post(route('owner.testimonials.toggle-approve', $testimonial->id));
        $response->assertRedirect();
        $this->assertDatabaseHas('testimonials', [
            'id' => $testimonial->id,
            'is_approved' => true,
        ]);

        // 3. Toggle Approve (to false)
        $response = $this->actingAs($this->owner)->post(route('owner.testimonials.toggle-approve', $testimonial->id));
        $response->assertRedirect();
        $this->assertDatabaseHas('testimonials', [
            'id' => $testimonial->id,
            'is_approved' => false,
        ]);

        // 4. Destroy
        $response = $this->actingAs($this->owner)->delete(route('owner.testimonials.destroy', $testimonial->id));
        $response->assertRedirect();
        $this->assertDatabaseMissing('testimonials', ['id' => $testimonial->id]);
    }
}
