using System.Data.Entity.ModelConfiguration.Conventions;
using System.Data.Entity;

namespace AdvertisedOn.Models
{
    public class AdvertisedOnDb : DbContext
    {
        public DbSet<Business> Businesses { get; set; }
        public DbSet<Advertisement> Advertisements { get; set; }
        public DbSet<Region> Regions { get; set; }
        public DbSet<RegionType> RegionTypes { get; set; }
        public DbSet<EmailType> EmailTypes { get; set; }
        public DbSet<ContactType> ContactTypes { get; set; }
        public DbSet<Heading> Headings { get; set; }
        public DbSet<Person> People { get; set; }
        public DbSet<Address> Addresses { get; set; }
        public DbSet<AddressType> AddressTypes { get; set; }
        public DbSet<Category> Categories { get; set; }
        public DbSet<Contact> Contacts { get; set; }
        public DbSet<PaymentType> PaymentTypes { get; set; }
        public DbSet<Logo> Logos { get; set; }

        public AdvertisedOnDb () : base ("name=DefaultConnection")
	    {
	    }

        protected override void OnModelCreating(DbModelBuilder modelBuilder)
        {
            modelBuilder.Conventions.Remove<PluralizingTableNameConvention>();

            modelBuilder.Entity<Advertisement>().
                HasRequired(p => p.Business);

            modelBuilder.Entity<Advertisement>().
                HasRequired(p => p.Heading);

            modelBuilder.Entity<Advertisement>().
                HasMany(p => p.Regions);

            modelBuilder.Entity<Business>().
                HasMany(b => b.Addresses).
                WithMany().
                Map(m =>
                {
                    m.ToTable("BusinessAddress");
                    m.MapLeftKey("BusinessId");
                    m.MapRightKey("AddressId");
                });


            modelBuilder.Entity<Business>().
              HasMany(b => b.Ads);

            modelBuilder.Entity<Business>().
              HasMany(b => b.Contacts).
              WithMany().
                Map(m =>
                {
                    m.ToTable("BusinessContact");
                    m.MapLeftKey("BusinessId");
                    m.MapRightKey("ContactId");
                });

            modelBuilder.Entity<Business>().
              HasMany(b => b.PaymentOptions);

            modelBuilder.Entity<Business>().
              HasMany(b => b.Photos).
               WithMany().
               Map(m =>
               {
                   m.ToTable("BusinessPhoto");
                   m.MapLeftKey("BusinessId");
                   m.MapRightKey("PhotoId");
               });

            modelBuilder.Entity<Business>().
              HasMany(b => b.Terms);

            modelBuilder.Entity<Business>().
               HasMany(b => b.Industries);

            modelBuilder.Entity<Region>().
               HasRequired(r => r.Type);

            modelBuilder.Entity<Region>().
               HasRequired(r => r.Advertisement);

            modelBuilder.Entity<Address>().
               HasRequired(a => a.Type);

            modelBuilder.Entity<Category>().
                HasOptional(c => c.ParentCategory);

            modelBuilder.Entity<Person>().
                HasMany(p => p.Addresses).
                WithMany().
                Map(m =>
                {
                    m.ToTable("PersonAddress");
                    m.MapLeftKey("PersonId");
                    m.MapRightKey("AddressId");
                });

            modelBuilder.Entity<Person>().
               HasMany(p => p.EmailAddresses).
               WithMany().
               Map(m =>
               {
                   m.ToTable("PersonEmailAddress");
                   m.MapLeftKey("PersonId");
                   m.MapRightKey("EmailId");
               });
        }
    }
}