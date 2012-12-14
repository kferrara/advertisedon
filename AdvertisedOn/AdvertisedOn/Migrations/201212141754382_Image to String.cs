namespace AdvertisedOn.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class ImagetoString : DbMigration
    {
        public override void Up()
        {
            AddColumn("dbo.Logo", "Url", c => c.String());
            DropColumn("dbo.Logo", "image");
        }
        
        public override void Down()
        {
            AddColumn("dbo.Logo", "image", c => c.Binary());
            DropColumn("dbo.Logo", "Url");
        }
    }
}
