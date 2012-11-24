namespace AdvertisedOn.Models
{
    public class Contact
    {
        public int ContactId { get; set; }
        public virtual Person Person { get; set; }
        public virtual ContactType Type { get; set; }
    }
}