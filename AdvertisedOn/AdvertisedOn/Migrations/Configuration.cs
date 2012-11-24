using AdvertisedOn.Models;

namespace AdvertisedOn.Migrations
{
    using System;
    using System.Data.Entity;
    using System.Data.Entity.Migrations;
    using System.Linq;

    internal sealed class Configuration : DbMigrationsConfiguration<AdvertisedOn.Models.AdvertisedOnDb>
    {
        public Configuration()
        {
            AutomaticMigrationsEnabled = false;
        }

        protected override void Seed(AdvertisedOn.Models.AdvertisedOnDb context)
        {
                 //  This method will be called after migrating to the latest version
                context.RegionTypes.AddOrUpdate(
                  r => r.Name,
                  new RegionType { Name = "North East" },
                  new RegionType { Name = "Mid Atlantic" },
                  new RegionType { Name = "South East" },
                  new RegionType { Name = "West" }
                );

                context.EmailTypes.AddOrUpdate(
                  e => e.Name,
                   new EmailType { Name = "Home" },
                   new EmailType { Name = "Work" }
                );


                context.ContactTypes.AddOrUpdate(
                  c => c.Name,
                  new ContactType { Name = "Personal" },
                  new ContactType { Name = "Business" }
                );


                context.Businesses.AddOrUpdate(
                 b => b.Name,
                 new Business { Name = "Acme Ltd", Information = "A products company" },
                 new Business { Name = "Ace Hardware", Information = "A hardware company" },
                 new Business { Name = "Duracell", Information = "A battery company" }
               );

                context.Categories.AddOrUpdate(
                    c => c.Name,
                    new Category { Name = "Autos" },
                    new Category { Name = "Contractors" },
                    new Category { Name = "Shopping" },
                    new Category { Name = "Personal Care" },
                    new Category { Name = "Restaurants" },
                    new Category { Name = "Home & Garden" }
                    );
        }
    }
}
