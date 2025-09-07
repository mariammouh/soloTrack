# SoloTrack - Management Platform for Solo Entrepreneurs
![SoloTrack logo](public\images\LOGO.png)
A comprehensive web-based management platform designed specifically for auto-entrepreneurs (solo entrepreneurs) to streamline their business operations and administrative tasks.

## 📋 Project Overview

SoloTrack is a complete business management solution that helps solo entrepreneurs manage their clients, products, inventory, suppliers, sales operations, purchases, expenses, and invoices through an intuitive and customizable interface.

## ✨ Features

### For Auto-Entrepreneurs
- **Centralized Dashboard**: Personalized overview of business data with interactive charts and statistics
- **Client Management**: Track client information, interaction history, and purchase records
- **Product & Inventory Management**: Manage product catalog with real-time stock tracking and low-stock alerts
- **Supplier Management**: Organize supplier information, orders, and payments by categories
- **Sales Operations**: Create and manage quotes (devis) with PDF generation and download
- **Purchase Operations**: Generate purchase orders (bon de commande) for suppliers
- **Expense Tracking**: Record, categorize, and monitor business expenses
- **Invoice Management**: Generate professional invoices with automated calculations
- **Business Consultation**: Request expert advice directly through the platform
- **Profile Customization**: Personalize interface themes, colors, and layout preferences
- **Multi-language Support**: Switch between different languages
- **PDF Reports**: Generate and download professional documents

### For Administrators
- **User Management**: Monitor all registered auto-entrepreneurs and their activities
- **Consultation Support**: Respond to user consultation requests with expert advice
- **Platform Analytics**: Comprehensive dashboard with platform-wide statistics
- **System Configuration**: Manage platform settings and user support

## 🛠️ Technology Stack

### Backend
- **Framework**: Laravel (PHP)
- **Database**: MySQL
- **Authentication**: Laravel built-in authentication

### Frontend
- **HTML5 & CSS3**: Structure and styling
- **SCSS**: Enhanced CSS preprocessing
- **JavaScript**: Interactive functionality
- **Bootstrap**: Responsive design framework
- **Chart.js**: Data visualization and analytics
- **JSON**: Data exchange format

### Development Tools
- **IDE**: Visual Studio Code
- **Local Server**: XAMPP
- **Version Control**: Git & GitHub
- **UML Modeling**: Enterprise Architect
- **Database Design**: Looping Software
- **Project Management**: Gantt charts

## 🏗️ System Architecture

### Database Design
The system uses a relational database with the following key entities:
- **Autoentrepreneur**: User profiles and business information
- **Client**: Customer management
- **Fournisseur (Supplier)**: Supplier information and categories
- **Produit (Product)**: Product catalog with inventory tracking
- **Devis (Quote)**: Sales quotes and proposals
- **Bon_de_commande (Purchase Order)**: Supplier orders
- **Dépenses (Expenses)**: Business expense tracking

### Key Relationships
- One-to-many relationships between entrepreneurs and their clients, products, suppliers
- Many-to-many relationships for quotes/orders and products
- Categorized suppliers for better organization

## 🚀 Installation & Setup

### Prerequisites
- PHP >= 7.4
- MySQL >= 5.7
- Composer
- Node.js & npm (for frontend dependencies)
- XAMPP or similar local server environment

### Installation Steps
1. **Clone the repository**
   ```bash
   git clone https://github.com/mariammouh/soloTrack.git
   cd solotrack
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database configuration**
   - Update `.env` file with your database credentials
   - Create a new MySQL database
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Build assets**
   ```bash
   npm run dev
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

## 📱 Usage

### Getting Started
1. **Registration**: Auto-entrepreneurs can register with their business information including:
   - Personal details (name, email, password)
   - Business information (ICE, company name, creation date, tax rate, etc.)
   - Company logo upload

2. **Dashboard**: Access a personalized dashboard showing:
   - Business statistics and KPIs
   - Recent transactions
   - Interactive charts and graphs
   - Quick access to all features

3. **Core Features**:
   - Add and manage clients, products, and suppliers
   - Create professional quotes and purchase orders
   - Track expenses and generate reports
   - Customize interface appearance and settings

### User Roles
- **Auto-Entrepreneur**: Full access to personal business management features
- **Administrator**: Platform management, user support, and consultation responses

## 🎨 Customization

Users can personalize their experience with:
- **Theme Options**: Light/dark mode toggle
- **Color Schemes**: Customizable sidebar colors
- **Navigation Styles**: Multiple sidebar layout options
- **Language Selection**: Multi-language interface
- **Dashboard Widgets**: Configurable dashboard components

## 📊 Business Rules

1. **Data Integrity**: All business information must be entered accurately and updated regularly
2. **Transaction Tracking**: Every operation with clients or suppliers must be recorded immediately
3. **User Experience**: Platform must provide intuitive and personalized experience for each user
4. **Document Generation**: All quotes and orders can be generated as professional PDF documents

## 🔮 Future Enhancements

- **Payment Tracking**: Enhanced payment status monitoring
- **Direct Payments**: Integration with payment gateways
- **Mobile Application**: Native mobile app development
- **Advanced Analytics**: More detailed business intelligence features
- **API Integration**: Third-party service integrations

## 👥 Project Team

**Developed by**: Mariam MOUH  
**Academic Supervisor**: Mr. Hicham EL MOUBTAHIJ  
**Industry Supervisor**: Mr. Annas EL HOUISSIQUE (Dot Concept)  
**Institution**: École Supérieure de Technologie – Agadir, Université IBN ZOHR

## 📅 Project Timeline

- **Duration**: 8 weeks internship (2023-2024)
- **Defense Date**: June 4, 2024
- **Development Phase**: 6 weeks of active development after 2 weeks of Laravel training

## 📞 Support & Contact

For technical support or consultation requests, users can contact the administration through:
- In-platform consultation system
- Contact form on the website
- Direct communication through the notification system

## 📄 License

This project was developed as part of an academic end-of-studies project at École Supérieure de Technologie – Agadir.

---

**Note**: This platform is designed specifically for the needs of auto-entrepreneurs in Morocco, incorporating local business requirements and regulations.
