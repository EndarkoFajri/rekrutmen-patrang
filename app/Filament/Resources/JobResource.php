<?php

namespace App\Filament\Resources;
use Filament\Forms\Components\Select;
use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Models\Job;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

   public static function form(Form $form): Form
{
    return $form
        ->schema([
            // Kartu 1: Informasi Utama
            Section::make('Informasi Utama Lowongan')
                ->description('Pengaturan judul dan status publikasi lowongan')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul Lowongan')
                        ->placeholder('Contoh: Dosen Informatika')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(1),

                    Forms\Components\Toggle::make('is_active')
                        ->label('Status Aktif')
                        ->helperText('Aktifkan agar tampil di halaman depan')
                        ->default(true)
                        ->inline(false)
                        ->columnSpan(1),
                ])
                ->columns(2),

            // Kartu 2: Detail & Persyaratan
            Section::make('Detail Pekerjaan & Persyaratan')
                ->schema([
                    Forms\Components\RichEditor::make('description')
                        ->label('Deskripsi Pekerjaan')
                        ->required()
                        ->columnSpanFull(),

                    Forms\Components\RichEditor::make('requirements')
                        ->label('Persyaratan')
                        ->columnSpanFull(),
                ]),

            // Kartu 3: Dokumen Persyaratan Pelamar
            Section::make('Persyaratan Dokumen')
                ->schema([
                    Forms\Components\TagsInput::make('required_documents')
                        ->label('Dokumen yang Wajib Diunggah')
                        ->placeholder('Ketik nama dokumen lalu tekan Enter (Contoh: CV, Portofolio, Ijazah, KTP)')
                        ->helperText('Tekan Enter setelah mengetik setiap nama dokumen')
                        ->default(['CV'])
                        ->columnSpanFull(),
                ]),
                
            Forms\Components\TextInput::make('category')
                ->label('Kategori')
                ->placeholder('Contoh: Akademik, Riset, Teknologi')
                ->required(),
        ]);
            // Kartu 4: Kategori &   

            // Select::make('category')
            // ->label('Kategori')
            // ->options(
            //     ['Akademik' => 'Akademik',
            //     'Riset' => 'Riset',
            //     'Administrasi' => 'Administrasi',
            //     'Layanan' => 'Layanan',
            //     'Laboratorium' => 'Laboratorium',
            //     'Teknologi' => 'Teknologi',]
            //         )
            //         ->searchable()
            //         ->createOptionForm([
            //     // Memungkinkan admin memasukkan nama kategori baru jika belum ada di daftar
            // ])
            // ->required(),
            //     ]);

                
}

   public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('title')
                ->label('Judul Lowongan')
                ->searchable(),

            // Membersihkan tag HTML dan membatasi teks maksimal 50 karakter
            Tables\Columns\TextColumn::make('description')
                ->label('Deskripsi')
                ->html()// Menghilangkan tag HTML seperti <p>
                ->limit(50),  // Membatasi panjang teks agar tabel tetap rapi

            Tables\Columns\IconColumn::make('is_active')
                ->label('Status Aktif')
                ->boolean(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat Pada')
                ->dateTime('d M Y'),
        ]);
}

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
