# Basic Coding Guidelines - Job Board Application

## Table of Contents
1. [Project Overview](#project-overview)
2. [Laravel Framework Guidelines](#laravel-framework-guidelines)
3. [Livewire Component Guidelines](#livewire-component-guidelines)
4. [Blade Template Guidelines](#blade-template-guidelines)
5. [Database & Models](#database--models)
6. [Testing Guidelines](#testing-guidelines)
7. [Security & Validation](#security--validation)
8. [Performance & Optimization](#performance--optimization)
9. [Code Organization](#code-organization)
10. [Naming Conventions](#naming-conventions)

## Project Overview

This is a **Laravel 12** job board application using **Livewire 3** for frontend interactivity, **Flux UI** for components, **Volt** for single-file components, and **Pest** for testing.

### Tech Stack
- **PHP**: 8.4+
- **Laravel Framework**: v12
- **Livewire**: v3
- **Livewire Volt**: v1
- **Flux UI**: v2 (Free Edition)
- **Tailwind CSS**: v4
- **Pest Testing**: v4

## Laravel Framework Guidelines

### 1. Follow Laravel 12 Structure
```php
// ✅ CORRECT - Use streamlined Laravel 12 structure
// No app/Http/Middleware/ - use bootstrap/app.php
// No app/Console/Kernel.php - use bootstrap/app.php or routes/console.php
// Commands auto-register from app/Console/Commands/
```

### 2. Configuration
```php
// ✅ CORRECT - Always use config() helper
$appName = config('app.name');
$dbConnection = config('database.default');

// ❌ WRONG - Never use env() outside config files
$appName = env('APP_NAME'); // DON'T DO THIS
```

### 3. Use Artisan Commands
```bash
# Always use artisan make commands
php artisan make:livewire JobCreate
php artisan make:model Job -mfs
php artisan make:test JobCreateTest --pest
php artisan make:request JobStoreRequest
```

### 4. Database Best Practices
```php
// ✅ CORRECT - Use Eloquent relationships
class Job extends Model
{
    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }
}

// ✅ CORRECT - Eager loading to prevent N+1
$jobs = Job::with('applications')->get();

// ❌ WRONG - Avoid raw queries when Eloquent can handle it
DB::select('SELECT * FROM jobs WHERE id = ?', [$id]);
```

## Livewire Component Guidelines

### 1. Component Structure
```php
<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\{On, Validate, Layout, Locked};

class JobCreate extends Component
{
    // 1. Use typed properties
    #[Validate('required|string|max:255')]
    public string $title = '';
    
    #[Validate('required|string|max:255')]
    public string $company = '';
    
    public bool $showModal = false;

    // 2. Lifecycle hooks
    public function mount(): void
    {
        // Initialize component
    }

    // 3. Actions
    #[On('open-job-modal')]
    public function openModal(): void
    {
        $this->clear();
        $this->showModal = true;
    }

    public function save(): void
    {
        $this->validate();
        
        $job = Job::create($this->only(['title', 'company', 'location', 'description']));
        
        $this->dispatch('jobCreated', $job->id);
        $this->reset();
    }

    // 4. Helper methods
    private function clear(): void
    {
        $this->reset(['title', 'company', 'location', 'description']);
    }

    // 5. Render method last
    public function render()
    {
        return view('livewire.job-create');
    }
}
```

### 2. Validation
```php
// ✅ CORRECT - Use Livewire Attributes for validation
#[Validate('required|email|unique:users,email')]
public string $email = '';

// ✅ CORRECT - Or rules() method for complex validation
public function rules(): array
{
    return [
        'email' => ['required', 'email', Rule::unique('users')->ignore($this->userId)],
        'password' => ['required', 'string', Rules\Password::defaults()],
    ];
}
```

### 3. Event Handling
```php
// ✅ CORRECT - Use dispatch() for events
$this->dispatch('jobCreated', $job->id);

// ✅ CORRECT - Listen to events with On attribute
#[On('refresh-jobs')]
public function refreshJobs(): void
{
    // Refresh logic
}
```

### 4. Authorization
```php
// ✅ CORRECT - Always authorize actions
public function editJob(Job $job): void
{
    $this->authorize('update', $job);
    
    $this->selectedJob = $job;
    $this->showEditModal = true;
}
```

## Blade Template Guidelines

### 1. Flux UI Components
```blade
{{-- ✅ CORRECT - Use Flux UI components when available --}}
<flux:button variant="primary" wire:click="save">
    Save Job
</flux:button>

<flux:input
    wire:model.live="search"
    label="Search Jobs"
    placeholder="Enter job title..."
/>

<flux:modal wire:model="showModal">
    <flux:modal.body>
        <!-- Modal content -->
    </flux:modal.body>
</flux:modal>
```

### 2. Livewire Directives
```blade
{{-- ✅ CORRECT - Use appropriate Livewire directives --}}
<form wire:submit="save">
    <input wire:model.live.debounce.300ms="search" type="text">
    
    <button 
        wire:click="save" 
        wire:loading.attr="disabled"
        wire:target="save"
    >
        <span wire:loading.remove wire:target="save">Save</span>
        <span wire:loading wire:target="save">Saving...</span>
    </button>
</form>

{{-- ✅ CORRECT - Use wire:key in loops --}}
@foreach($jobs as $job)
    <div wire:key="job-{{ $job->id }}">
        {{ $job->title }}
    </div>
@endforeach
```

### 3. Tailwind CSS Classes
```blade
{{-- ✅ CORRECT - Use Tailwind v4 classes --}}
<div class="bg-white border border-gray-100 rounded-2xl shadow-md hover:shadow-lg transition p-6">
    {{-- Use gap utilities for spacing --}}
    <div class="flex gap-4 items-center">
        <span class="shrink-0">Icon</span> {{-- Use shrink-* instead of flex-shrink-* --}}
        <div class="grow">Content</div> {{-- Use grow instead of flex-grow --}}
    </div>
</div>

{{-- ✅ CORRECT - Support dark mode --}}
<div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
    Content
</div>
```

## Database & Models

### 1. Model Definition
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Factories\HasFactory};
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_lists';

    protected $fillable = [
        'title',
        'company',
        'location',
        'description',
    ];

    // ✅ CORRECT - Use casts() method for Laravel 12
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    // ✅ CORRECT - Explicit return types for relationships
    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
```

### 2. Migrations
```php
// ✅ CORRECT - Include all attributes when modifying columns
Schema::table('jobs', function (Blueprint $table) {
    $table->string('title', 500)->nullable(false)->change(); // Include all previous attributes
});
```

## Testing Guidelines

### 1. Pest Test Structure
```php
<?php

use App\Livewire\JobCreate;
use App\Models\{Job, User};
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('job creation form can be rendered', function () {
    $user = User::factory()->create();
    
    $this->actingAs($user)
        ->get('/jobs/create')
        ->assertSeeLivewire(JobCreate::class);
});

test('authenticated user can create job', function () {
    $user = User::factory()->create();
    
    $response = Livewire::test(JobCreate::class)
        ->actingAs($user)
        ->set('title', 'Software Developer')
        ->set('company', 'Tech Corp')
        ->set('location', 'Remote')
        ->set('description', 'Great job opportunity')
        ->call('save');

    $response->assertHasNoErrors();
    
    expect(Job::where('title', 'Software Developer')->exists())->toBeTrue();
});

test('validation errors are shown for invalid data', function (string $field, mixed $value) {
    $user = User::factory()->create();
    
    Livewire::test(JobCreate::class)
        ->actingAs($user)
        ->set($field, $value)
        ->call('save')
        ->assertHasErrors([$field]);
})->with([
    'empty title' => ['title', ''],
    'long title' => ['title', str_repeat('a', 256)],
    'empty company' => ['company', ''],
]);
```

### 2. Browser Testing (Pest v4)
```php
test('user can create job through browser', function () {
    $user = User::factory()->create();
    
    $this->actingAs($user);
    
    $page = visit('/jobs/create');
    
    $page->assertSee('Create Job')
        ->fill('title', 'Software Developer')
        ->fill('company', 'Tech Corp')
        ->click('Save')
        ->assertSee('Job created successfully');
});
```

## Security & Validation

### 1. Form Request Validation
```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', Job::class);
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Job title is required.',
            'title.max' => 'Job title cannot exceed 255 characters.',
        ];
    }
}
```

### 2. Authorization Policies
```php
<?php

namespace App\Policies;

use App\Models\{User, Job};

class JobPolicy
{
    public function update(User $user, Job $job): bool
    {
        return $user->id === $job->user_id || $user->hasRole('admin');
    }

    public function delete(User $user, Job $job): bool
    {
        return $user->id === $job->user_id || $user->hasRole('admin');
    }
}
```

## Performance & Optimization

### 1. Eager Loading
```php
// ✅ CORRECT - Prevent N+1 queries
$jobs = Job::with(['applications', 'user'])->paginate(10);

// ✅ CORRECT - Load counts
$jobs = Job::withCount('applications')->get();
```

### 2. Livewire Optimization
```php
// ✅ CORRECT - Use computed properties for expensive operations
use function Livewire\Volt\{computed};

$jobs = computed(function () {
    return Job::with('applications')
        ->when($this->search, fn($query) => $query->where('title', 'like', "%{$this->search}%"))
        ->paginate(10);
});
```

## Code Organization

### 1. Directory Structure
```
app/
├── Http/
│   └── Controllers/           # Minimal controllers
├── Livewire/                 # Livewire components
│   ├── Auth/                 # Authentication components
│   ├── Settings/             # User settings
│   └── Actions/              # Reusable actions
├── Models/                   # Eloquent models
├── Policies/                 # Authorization policies
└── Providers/               # Service providers
```

### 2. Service Organization
```php
// ✅ CORRECT - Extract complex logic to services
namespace App\Services;

class JobService
{
    public function createJob(array $data, User $user): Job
    {
        return Job::create(array_merge($data, [
            'user_id' => $user->id,
            'published_at' => now(),
        ]));
    }
}
```

## Naming Conventions

### 1. Classes
```php
// ✅ CORRECT
class JobCreate extends Component        // Livewire components: PascalCase
class JobPolicy                         // Policies: ModelPolicy
class JobStoreRequest                   // Requests: DescriptiveRequest
class Job extends Model                 // Models: Singular PascalCase
```

### 2. Methods & Properties
```php
// ✅ CORRECT
public function createJob(): void       // Methods: camelCase, descriptive
public string $jobTitle = '';          // Properties: camelCase
public bool $isPublished = false;      // Boolean: is/has/can prefix
```

### 3. Routes & Views
```php
// ✅ CORRECT
Route::get('/jobs/create', JobCreate::class)->name('jobs.create');  // kebab-case
// resources/views/livewire/job-create.blade.php                     // kebab-case
```

### 4. Database
```sql
-- ✅ CORRECT
CREATE TABLE job_applications (        -- snake_case, plural
    id BIGINT PRIMARY KEY,
    job_id BIGINT,                     -- snake_case
    user_id BIGINT,
    created_at TIMESTAMP
);
```

## Code Formatting

### 1. Laravel Pint
Always run Pint before committing:
```bash
vendor/bin/pint --dirty
```

### 2. PHP Formatting
```php
<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Validate;

class JobCreate extends Component
{
    #[Validate('required|string|max:255')]
    public string $title = '';

    public function save(): void
    {
        $this->validate();

        Job::create($this->only(['title', 'company', 'location']));

        $this->dispatch('job-created');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.job-create');
    }
}
```

## Error Handling & Debugging

### 1. Livewire Error Handling
```php
public function save(): void
{
    try {
        $this->validate();
        
        Job::create($this->validated());
        
        session()->flash('success', 'Job created successfully!');
    } catch (ValidationException $e) {
        // Let Livewire handle validation errors
        throw $e;
    } catch (\Exception $e) {
        $this->addError('general', 'An error occurred while saving the job.');
        logger()->error('Job creation failed', ['error' => $e->getMessage()]);
    }
}
```

### 2. Use Laravel Boost for Debugging
```php
// Use Boost tools for debugging:
// - tinker tool for testing Eloquent queries
// - database-query tool for direct SQL queries
// - last-error tool to check recent errors
// - browser-logs tool for frontend debugging
```

## Comments & Documentation

### 1. PHPDoc Blocks
```php
/**
 * Create a new job posting.
 *
 * @param array{title: string, company: string, location: string} $data
 * @return Job
 * @throws ValidationException
 */
public function createJob(array $data): Job
{
    // Implementation
}
```

### 2. Inline Comments (Use Sparingly)
```php
// Only add comments for complex business logic
public function calculateSalaryRange(): array
{
    // Apply company-specific salary adjustments based on location
    // Remote positions get 10% reduction, major cities get 15% increase
    return $this->baseSalary * $this->locationMultiplier;
}
```

---

## Quick Reference Checklist

- [ ] Use Laravel 12 streamlined structure
- [ ] Follow Livewire 3 patterns with typed properties
- [ ] Use Flux UI components when available
- [ ] Write Pest tests for all functionality
- [ ] Use proper authorization with policies
- [ ] Eager load relationships to prevent N+1
- [ ] Use `config()` helper, never `env()` outside config files
- [ ] Run `vendor/bin/pint --dirty` before committing
- [ ] Use descriptive names for methods and variables
- [ ] Add proper validation with Form Requests or Livewire attributes
- [ ] Support dark mode in Tailwind classes
- [ ] Use `wire:key` in loops
- [ ] Handle loading states in Livewire
- [ ] Use Laravel Boost tools for debugging

---

**Remember**: This is a living document. Update it as the project evolves and new patterns emerge.
