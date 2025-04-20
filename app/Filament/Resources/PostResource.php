<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = \App\Models\Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Blog Posts';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->helperText('URL-friendly version of the title. Use hyphens to separate words.')
                    ->default(function ($get) {
                        return Str::slug($get('title'));  // Auto-generate slug from title if empty
                    }),
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                    Forms\Components\FileUpload::make('featured_image')
                    ->image() // Ensures the uploaded file is an image
                    ->maxSize(1024) // Limits the file size to 1MB (1024KB)
                    ->required() // Makes the field required
                    ->directory('posts'),// Specifies the directory where the file will be stored
                
                Forms\Components\Toggle::make('is_published')
                    ->required(),
                Forms\Components\TextInput::make('meta_title')
                    ->maxLength(255)
                    ->default(function ($get) {
                        // Auto-generate meta_title from the title if empty
                        return $get('meta_title') ?? $get('title');
                    })
                    ->helperText('Title for search engine result pages (SEO).'),
                Forms\Components\Textarea::make('meta_description')
                    ->columnSpanFull()
                    ->helperText('Description of the post to be displayed in search engines.')
                    ->default(function ($get) {
                        // Auto-generate meta_description from the first 160 characters of content
                        $content = $get('content');
                        return Str::limit(strip_tags($content), 160);  // Strip HTML tags and limit to 160 chars
                    }),
                Forms\Components\TextInput::make('meta_keywords')
                    ->maxLength(255)
                    ->default(null)
                    ->helperText('Comma separated list of keywords for SEO.'),
                Forms\Components\Toggle::make('enable_schema_markup')
                    ->required()
                    ->label('Enable Schema Markup')
                    ->helperText('Enable schema markup for better SEO and rich results.')
                    ->default(true),
                Forms\Components\Textarea::make('schema_markup')
                    ->label('Custom Schema Markup (JSON-LD)')
                    ->helperText('Input custom JSON-LD schema here for SEO purposes.')
                    ->default(null)
                    ->nullable()
                    ->hidden(fn (callable $get) => !$get('enable_schema_markup'))
                    ->rules('nullable|json'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                //Tables\Columns\TextColumn::make('slug')
                //    ->searchable(),
                Tables\Columns\ImageColumn::make('featured_image'),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                //Tables\Columns\TextColumn::make('meta_title')
                //    ->searchable(),
                //Tables\Columns\TextColumn::make('meta_keywords')
                //    ->searchable(),
                //Tables\Columns\TextColumn::make('meta_description')
                //    ->limit(50)
                //    ->searchable(),
                Tables\Columns\IconColumn::make('enable_schema_markup')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('is_published')
                    ->query(fn ($query) => $query->where('is_published', true))
                    ->label('Published'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
