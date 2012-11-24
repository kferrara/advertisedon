namespace AdvertisedOn.Models
{
    public class Email
    {
        public int EmailId { get; set; }
        public string Address { get; set; }
        public virtual EmailType Type { get; set; }
    }
}