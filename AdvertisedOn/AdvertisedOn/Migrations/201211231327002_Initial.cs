namespace AdvertisedOn.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class Initial : DbMigration
    {
        public override void Up()
        {
            CreateTable(
                "dbo.Business",
                c => new
                    {
                        BusinessId = c.Int(nullable: false, identity: true),
                        Name = c.String(),
                        Information = c.String(),
                        Website = c.String(),
                        Logo_LogoId = c.Int(),
                        EmailAddress_EmailId = c.Int(),
                    })
                .PrimaryKey(t => t.BusinessId)
                .ForeignKey("dbo.Logo", t => t.Logo_LogoId)
                .ForeignKey("dbo.Email", t => t.EmailAddress_EmailId)
                .Index(t => t.Logo_LogoId)
                .Index(t => t.EmailAddress_EmailId);
            
            CreateTable(
                "dbo.Logo",
                c => new
                    {
                        LogoId = c.Int(nullable: false, identity: true),
                        image = c.Binary(),
                    })
                .PrimaryKey(t => t.LogoId);
            
            CreateTable(
                "dbo.Email",
                c => new
                    {
                        EmailId = c.Int(nullable: false, identity: true),
                        Address = c.String(),
                        Type_EmailTypeId = c.Int(),
                    })
                .PrimaryKey(t => t.EmailId)
                .ForeignKey("dbo.EmailType", t => t.Type_EmailTypeId)
                .Index(t => t.Type_EmailTypeId);
            
            CreateTable(
                "dbo.EmailType",
                c => new
                    {
                        EmailTypeId = c.Int(nullable: false, identity: true),
                        Name = c.String(),
                    })
                .PrimaryKey(t => t.EmailTypeId);
            
            CreateTable(
                "dbo.Industry",
                c => new
                    {
                        IndustryId = c.Int(nullable: false, identity: true),
                        Category_CategoryId = c.Int(),
                        Business_BusinessId = c.Int(),
                    })
                .PrimaryKey(t => t.IndustryId)
                .ForeignKey("dbo.Category", t => t.Category_CategoryId)
                .ForeignKey("dbo.Business", t => t.Business_BusinessId)
                .Index(t => t.Category_CategoryId)
                .Index(t => t.Business_BusinessId);
            
            CreateTable(
                "dbo.Category",
                c => new
                    {
                        CategoryId = c.Int(nullable: false, identity: true),
                        Name = c.String(),
                        ParentCategory_CategoryId = c.Int(),
                    })
                .PrimaryKey(t => t.CategoryId)
                .ForeignKey("dbo.Category", t => t.ParentCategory_CategoryId)
                .Index(t => t.ParentCategory_CategoryId);
            
            CreateTable(
                "dbo.Address",
                c => new
                    {
                        AddressId = c.Int(nullable: false, identity: true),
                        Address1 = c.String(),
                        Address2 = c.String(),
                        City = c.String(),
                        State = c.String(),
                        Zip = c.String(),
                        Type_AddressTypeId = c.Int(nullable: false),
                    })
                .PrimaryKey(t => t.AddressId)
                .ForeignKey("dbo.AddressType", t => t.Type_AddressTypeId, cascadeDelete: true)
                .Index(t => t.Type_AddressTypeId);
            
            CreateTable(
                "dbo.AddressType",
                c => new
                    {
                        AddressTypeId = c.Int(nullable: false, identity: true),
                        Type = c.String(),
                    })
                .PrimaryKey(t => t.AddressTypeId);
            
            CreateTable(
                "dbo.Contact",
                c => new
                    {
                        ContactId = c.Int(nullable: false, identity: true),
                        Person_PersonId = c.Int(),
                        Type_ContactTypeId = c.Int(),
                    })
                .PrimaryKey(t => t.ContactId)
                .ForeignKey("dbo.Person", t => t.Person_PersonId)
                .ForeignKey("dbo.ContactType", t => t.Type_ContactTypeId)
                .Index(t => t.Person_PersonId)
                .Index(t => t.Type_ContactTypeId);
            
            CreateTable(
                "dbo.Person",
                c => new
                    {
                        PersonId = c.Int(nullable: false, identity: true),
                        FirstName = c.String(),
                        LastName = c.String(),
                    })
                .PrimaryKey(t => t.PersonId);
            
            CreateTable(
                "dbo.ContactType",
                c => new
                    {
                        ContactTypeId = c.Int(nullable: false, identity: true),
                        Name = c.String(),
                    })
                .PrimaryKey(t => t.ContactTypeId);
            
            CreateTable(
                "dbo.Term",
                c => new
                    {
                        TermId = c.Int(nullable: false, identity: true),
                        term = c.String(),
                        Business_BusinessId = c.Int(),
                    })
                .PrimaryKey(t => t.TermId)
                .ForeignKey("dbo.Business", t => t.Business_BusinessId)
                .Index(t => t.Business_BusinessId);
            
            CreateTable(
                "dbo.Payment",
                c => new
                    {
                        PaymentId = c.Int(nullable: false, identity: true),
                        Information = c.String(),
                        Type_PaymentTypeId = c.Int(),
                        Business_BusinessId = c.Int(),
                    })
                .PrimaryKey(t => t.PaymentId)
                .ForeignKey("dbo.PaymentType", t => t.Type_PaymentTypeId)
                .ForeignKey("dbo.Business", t => t.Business_BusinessId)
                .Index(t => t.Type_PaymentTypeId)
                .Index(t => t.Business_BusinessId);
            
            CreateTable(
                "dbo.PaymentType",
                c => new
                    {
                        PaymentTypeId = c.Int(nullable: false, identity: true),
                        Type = c.String(),
                    })
                .PrimaryKey(t => t.PaymentTypeId);
            
            CreateTable(
                "dbo.Advertisement",
                c => new
                    {
                        AdvertisementId = c.Int(nullable: false, identity: true),
                        EffectiveDate = c.DateTime(nullable: false),
                        ExporationDate = c.DateTime(nullable: false),
                        Heading_HeadingId = c.Int(nullable: false),
                        Business_BusinessId = c.Int(nullable: false),
                    })
                .PrimaryKey(t => t.AdvertisementId)
                .ForeignKey("dbo.Heading", t => t.Heading_HeadingId, cascadeDelete: true)
                .ForeignKey("dbo.Business", t => t.Business_BusinessId, cascadeDelete: true)
                .Index(t => t.Heading_HeadingId)
                .Index(t => t.Business_BusinessId);
            
            CreateTable(
                "dbo.Heading",
                c => new
                    {
                        HeadingId = c.Int(nullable: false, identity: true),
                        Text = c.String(),
                    })
                .PrimaryKey(t => t.HeadingId);
            
            CreateTable(
                "dbo.Region",
                c => new
                    {
                        RegionId = c.Int(nullable: false, identity: true),
                        Type_RegionTypeId = c.Int(nullable: false),
                        Advertisement_AdvertisementId = c.Int(nullable: false),
                    })
                .PrimaryKey(t => t.RegionId)
                .ForeignKey("dbo.RegionType", t => t.Type_RegionTypeId, cascadeDelete: true)
                .ForeignKey("dbo.Advertisement", t => t.Advertisement_AdvertisementId, cascadeDelete: true)
                .Index(t => t.Type_RegionTypeId)
                .Index(t => t.Advertisement_AdvertisementId);
            
            CreateTable(
                "dbo.RegionType",
                c => new
                    {
                        RegionTypeId = c.Int(nullable: false, identity: true),
                        Name = c.String(),
                    })
                .PrimaryKey(t => t.RegionTypeId);
            
            CreateTable(
                "dbo.Photo",
                c => new
                    {
                        PhotoId = c.Int(nullable: false, identity: true),
                        photo = c.Binary(),
                    })
                .PrimaryKey(t => t.PhotoId);
            
            CreateTable(
                "dbo.BusinessAddress",
                c => new
                    {
                        BusinessId = c.Int(nullable: false),
                        AddressId = c.Int(nullable: false),
                    })
                .PrimaryKey(t => new { t.BusinessId, t.AddressId })
                .ForeignKey("dbo.Business", t => t.BusinessId, cascadeDelete: true)
                .ForeignKey("dbo.Address", t => t.AddressId, cascadeDelete: true)
                .Index(t => t.BusinessId)
                .Index(t => t.AddressId);
            
            CreateTable(
                "dbo.PersonEmailAddress",
                c => new
                    {
                        PersonId = c.Int(nullable: false),
                        EmailId = c.Int(nullable: false),
                    })
                .PrimaryKey(t => new { t.PersonId, t.EmailId })
                .ForeignKey("dbo.Person", t => t.PersonId, cascadeDelete: true)
                .ForeignKey("dbo.Email", t => t.EmailId, cascadeDelete: true)
                .Index(t => t.PersonId)
                .Index(t => t.EmailId);
            
            CreateTable(
                "dbo.PersonAddress",
                c => new
                    {
                        PersonId = c.Int(nullable: false),
                        AddressId = c.Int(nullable: false),
                    })
                .PrimaryKey(t => new { t.PersonId, t.AddressId })
                .ForeignKey("dbo.Person", t => t.PersonId, cascadeDelete: true)
                .ForeignKey("dbo.Address", t => t.AddressId, cascadeDelete: true)
                .Index(t => t.PersonId)
                .Index(t => t.AddressId);
            
            CreateTable(
                "dbo.BusinessContact",
                c => new
                    {
                        BusinessId = c.Int(nullable: false),
                        ContactId = c.Int(nullable: false),
                    })
                .PrimaryKey(t => new { t.BusinessId, t.ContactId })
                .ForeignKey("dbo.Business", t => t.BusinessId, cascadeDelete: true)
                .ForeignKey("dbo.Contact", t => t.ContactId, cascadeDelete: true)
                .Index(t => t.BusinessId)
                .Index(t => t.ContactId);
            
            CreateTable(
                "dbo.BusinessPhoto",
                c => new
                    {
                        BusinessId = c.Int(nullable: false),
                        PhotoId = c.Int(nullable: false),
                    })
                .PrimaryKey(t => new { t.BusinessId, t.PhotoId })
                .ForeignKey("dbo.Business", t => t.BusinessId, cascadeDelete: true)
                .ForeignKey("dbo.Photo", t => t.PhotoId, cascadeDelete: true)
                .Index(t => t.BusinessId)
                .Index(t => t.PhotoId);
            
        }
        
        public override void Down()
        {
            DropIndex("dbo.BusinessPhoto", new[] { "PhotoId" });
            DropIndex("dbo.BusinessPhoto", new[] { "BusinessId" });
            DropIndex("dbo.BusinessContact", new[] { "ContactId" });
            DropIndex("dbo.BusinessContact", new[] { "BusinessId" });
            DropIndex("dbo.PersonAddress", new[] { "AddressId" });
            DropIndex("dbo.PersonAddress", new[] { "PersonId" });
            DropIndex("dbo.PersonEmailAddress", new[] { "EmailId" });
            DropIndex("dbo.PersonEmailAddress", new[] { "PersonId" });
            DropIndex("dbo.BusinessAddress", new[] { "AddressId" });
            DropIndex("dbo.BusinessAddress", new[] { "BusinessId" });
            DropIndex("dbo.Region", new[] { "Advertisement_AdvertisementId" });
            DropIndex("dbo.Region", new[] { "Type_RegionTypeId" });
            DropIndex("dbo.Advertisement", new[] { "Business_BusinessId" });
            DropIndex("dbo.Advertisement", new[] { "Heading_HeadingId" });
            DropIndex("dbo.Payment", new[] { "Business_BusinessId" });
            DropIndex("dbo.Payment", new[] { "Type_PaymentTypeId" });
            DropIndex("dbo.Term", new[] { "Business_BusinessId" });
            DropIndex("dbo.Contact", new[] { "Type_ContactTypeId" });
            DropIndex("dbo.Contact", new[] { "Person_PersonId" });
            DropIndex("dbo.Address", new[] { "Type_AddressTypeId" });
            DropIndex("dbo.Category", new[] { "ParentCategory_CategoryId" });
            DropIndex("dbo.Industry", new[] { "Business_BusinessId" });
            DropIndex("dbo.Industry", new[] { "Category_CategoryId" });
            DropIndex("dbo.Email", new[] { "Type_EmailTypeId" });
            DropIndex("dbo.Business", new[] { "EmailAddress_EmailId" });
            DropIndex("dbo.Business", new[] { "Logo_LogoId" });
            DropForeignKey("dbo.BusinessPhoto", "PhotoId", "dbo.Photo");
            DropForeignKey("dbo.BusinessPhoto", "BusinessId", "dbo.Business");
            DropForeignKey("dbo.BusinessContact", "ContactId", "dbo.Contact");
            DropForeignKey("dbo.BusinessContact", "BusinessId", "dbo.Business");
            DropForeignKey("dbo.PersonAddress", "AddressId", "dbo.Address");
            DropForeignKey("dbo.PersonAddress", "PersonId", "dbo.Person");
            DropForeignKey("dbo.PersonEmailAddress", "EmailId", "dbo.Email");
            DropForeignKey("dbo.PersonEmailAddress", "PersonId", "dbo.Person");
            DropForeignKey("dbo.BusinessAddress", "AddressId", "dbo.Address");
            DropForeignKey("dbo.BusinessAddress", "BusinessId", "dbo.Business");
            DropForeignKey("dbo.Region", "Advertisement_AdvertisementId", "dbo.Advertisement");
            DropForeignKey("dbo.Region", "Type_RegionTypeId", "dbo.RegionType");
            DropForeignKey("dbo.Advertisement", "Business_BusinessId", "dbo.Business");
            DropForeignKey("dbo.Advertisement", "Heading_HeadingId", "dbo.Heading");
            DropForeignKey("dbo.Payment", "Business_BusinessId", "dbo.Business");
            DropForeignKey("dbo.Payment", "Type_PaymentTypeId", "dbo.PaymentType");
            DropForeignKey("dbo.Term", "Business_BusinessId", "dbo.Business");
            DropForeignKey("dbo.Contact", "Type_ContactTypeId", "dbo.ContactType");
            DropForeignKey("dbo.Contact", "Person_PersonId", "dbo.Person");
            DropForeignKey("dbo.Address", "Type_AddressTypeId", "dbo.AddressType");
            DropForeignKey("dbo.Category", "ParentCategory_CategoryId", "dbo.Category");
            DropForeignKey("dbo.Industry", "Business_BusinessId", "dbo.Business");
            DropForeignKey("dbo.Industry", "Category_CategoryId", "dbo.Category");
            DropForeignKey("dbo.Email", "Type_EmailTypeId", "dbo.EmailType");
            DropForeignKey("dbo.Business", "EmailAddress_EmailId", "dbo.Email");
            DropForeignKey("dbo.Business", "Logo_LogoId", "dbo.Logo");
            DropTable("dbo.BusinessPhoto");
            DropTable("dbo.BusinessContact");
            DropTable("dbo.PersonAddress");
            DropTable("dbo.PersonEmailAddress");
            DropTable("dbo.BusinessAddress");
            DropTable("dbo.Photo");
            DropTable("dbo.RegionType");
            DropTable("dbo.Region");
            DropTable("dbo.Heading");
            DropTable("dbo.Advertisement");
            DropTable("dbo.PaymentType");
            DropTable("dbo.Payment");
            DropTable("dbo.Term");
            DropTable("dbo.ContactType");
            DropTable("dbo.Person");
            DropTable("dbo.Contact");
            DropTable("dbo.AddressType");
            DropTable("dbo.Address");
            DropTable("dbo.Category");
            DropTable("dbo.Industry");
            DropTable("dbo.EmailType");
            DropTable("dbo.Email");
            DropTable("dbo.Logo");
            DropTable("dbo.Business");
        }
    }
}
