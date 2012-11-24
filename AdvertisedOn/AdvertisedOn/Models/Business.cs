using System.Collections.Generic;

namespace AdvertisedOn.Models
{
    public class Business
    {
        public int BusinessId { get; set; }
        public string Name { get; set; }
        public virtual Logo Logo { get; set; }
        public string Information { get; set; }
        public string Website { get; set; }
        public virtual Email EmailAddress { get; set; }
        public virtual ICollection<Industry> Industries { get; set; }
        public virtual ICollection<Address> Addresses { get; set; }
        public virtual ICollection<Contact> Contacts { get; set; }
        public virtual ICollection<Term> Terms { get; set; }
        public virtual ICollection<Payment> PaymentOptions { get; set; }
        public virtual ICollection<Advertisement> Ads { get; set; }
        public virtual ICollection<Photo> Photos { get; set; }
    }
}